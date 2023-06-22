#!C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe

import sys
import requests
import pyodbc 
import time
import json
import collections

#while True:


#dept_id = sys.argv[1]

#print (dept_id)

#print ("test222")

run_dir = r'C:/holistic/bookshop/bookdata.accdb'

#print (run_dir)
#connection srings C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe
    
connStr = (
        r"DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};"
        r"DBQ="+run_dir+";"
        )
        
#print ("dave333")

#print ("dave3330")
conn = pyodbc.connect(connStr)
#print ("dave3331")
conn3 = pyodbc.connect(connStr)
#print ("dave3332")
cursorboadd = conn.cursor()     

#print ("dave444")
#quit()
#quit()

data = []



cursorboadd.execute("SELECT * from web_dept")
              
objects_list = []
rows = cursorboadd.fetchall()
for row in rows:

    #also 
    
    cursorprodcatlist = conn3.cursor()
    select_send = "select * from getcountcat where dept_id =?"
    params_send = (
        row[0]
    )
    
    #print ("hello2",row[0])            
    cursorprodcatlist.execute(select_send, params_send)
    for row2cat in cursorprodcatlist.fetchall():
        #print ("dave", row2cat.Expr1)
	
    
        d = collections.OrderedDict()
        d['dept_id'] = row[0]
        d['dept_name'] = row[1]
        d['display_status'] = row[2]
        d['dept_count'] = row2cat.Expr1
        objects_list.append(d)
        j = json.dumps(objects_list)

    #data.append([x for x in row]) # or simply data.append(list(row))
    
print  (j)


        

