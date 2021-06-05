#!/usr/bin/env python
import mysql.connector
import urllib2
import time

db = mysql.connector.connect(host='34.71.128.221',    # cloud sql server public ip
                     user='root',         # your username
                     password='',  # your password
                     database='covid')        # name of the data base


cur = db.cursor()
while 1:
    response = urllib2.urlopen("http://192.168.0.14/") #ip address fetched from arduino code
    page_source = response.read()
    id = page_source.split('|')[0]
    bpm = page_source.split('|')[1]
    temp = page_source.split('|')[2]
    blood_oxg = page_source.split('|')[3]

    try:
        cur.execute("""UPDATE patients set temp = %s, bpm = %s, blood oxygen = %s where bins_id = %s""",(temp, bpm, blood_oxg, id))
        db.commit()
        print("Data Commited")

    except:
        print("Rollback")
    time.sleep(10)

db.close()

