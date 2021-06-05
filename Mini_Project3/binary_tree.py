from mininet.topo import Topo

class MyTopo( Topo ):
    "Simple topology example."

    def __init__( self ):
        "Create custom topo."

        # Initialize topology
        Topo.__init__( self )

        # Add hosts and switches
        h1 = self.addHost( 'h1' )
        h2 = self.addHost( 'h2' )
        h3 = self.addHost( 'h3' )
        h4 = self.addHost( 'h4' )
        h5 = self.addHost( 'h5' )
        s6 = self.addSwitch( 's6' )
        s4 = self.addSwitch( 's4' )
        s5 = self.addSwitch( 's5' )
        s1 = self.addSwitch( 's1' )
        s2 = self.addSwitch( 's2' )
        s3 = self.addSwitch( 's3' )

        # Add links
        self.addLink( s6, s4 )
        self.addLink( s6, s5 )
        self.addLink( s4, s1 )
        self.addLink( s4, s2 )
        self.addLink( s5, s3 )
        self.addLink( s1, h1 )
        self.addLink( s1, h2 )
        self.addLink( s2, h3 )
        self.addLink( s2, h4 )
        self.addLink( s3, h5 )


topos = { 'mytopo': ( lambda: MyTopo() ) }