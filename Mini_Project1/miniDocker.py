#!/usr/bin/python3
import unshare
import argparse
import os
import sys

from cgroups import Cgroup
cg = Cgroup('name')

def uts_namespace(args):
	unshare.unshare(unshare.CLONE_NEWUTS)
	pass

def net_namespace(args):
	unshare.unshare(unshare.CLONE_NEWNET)
	pass

def mnt_namespace(args):
	unshare.unshare(unshare.CLONE_NEWNS)
	pass

def pid_namespace(args):
	unshare.unshare(unshare.CLONE_NEWPID)
	pass

def cpu_cgroup(args):
	pass

def mem_cgroup(args):
	cg.set_memory_limit(args.mem_size)
	pass

def exe_bash(args):
	newpid = os.fork()
	if newpid == 0:
		cg.add(os.getpid())
		os.system('hostname %s' % args.hostname)
		os.chroot(args.root_path)
		os.chdir(args.root_path)
		os.system('mount /proc')
		os.system('ip link add eth1 type veth')
		os.system('ip addr add %s dev eth1' % args.ip_addr)
		os.system('ip link set eth1 up')
		os.execle('/bin/bash', '/bin/bash', os.environ)
	else:
		os.wait()
	pass

if __name__ == "__main__":
	print ("*************************")
	print ("*                       *")
	print ("*      Mini Docker      *")
	print ("*                       *")
	print ("*************************")

	parser = argparse.ArgumentParser(description='This is a miniDocker.')

	parser.add_argument('--hostname', action="store", dest="hostname", type=str, default="administrator", help='set the container\'s hostname')

	parser.add_argument('--ip_addr', action="store", dest="ip_addr", type=str, default="10.0.0.1", help='set the container\'s ip address')

	parser.add_argument('--mem', action="store", dest="mem_size", type=int, default=10, help='set the container\'s memory size (MB)')

	parser.add_argument('--cpu', action="store", dest="cpu_num", type=int, default=1, help='set the container\'s cpu number')

	parser.add_argument('--root_path', action="store", dest="root_path", type=str, default="./new_root", help='set the new root file system path of the container')

	args = parser.parse_args()

	#create hostname namespace
	uts_namespace(args)
	#create network namespace
	net_namespace(args)
	#create filesystem namespace
	mnt_namespace(args)
	#create cpu cgroup
	cpu_cgroup(args)
	#create memory cgroup
	mem_cgroup(args)
	#create pid namespace
	pid_namespace(args)
	#execute the bash process "/bin/bash"
	exe_bash(args)