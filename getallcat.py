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


run_dir = r'C:/holistic/bookshop/bookdata.accdb'


#connection srings C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe
    
connStr = (
        r"DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};"
        r"DBQ="+run_dir+";"
        )
conn = pyodbc.connect(connStr)
conn3 = pyodbc.connect(connStr)
     
cursorboadd = conn.cursor()     

data = []



cursorboadd.execute("SELECT * from web_cat")
              
objects_list = []
rows = cursorboadd.fetchall()
for row in rows:

    #also 
    
    cursorprodcatlist = conn3.cursor()
    select_send = "select * from getcountcat where cat_id =?"
    params_send = (
        row[0]
    )
                
    cursorprodcatlist.execute(select_send, params_send)
    for row2cat in cursorprodcatlist.fetchall():
        #print ("dave", row2cat.Expr1)
    
        d = collections.OrderedDict()
        d['cat_id'] = row[0]
        d['cat_name'] = row[1]
        d['dept_id'] = row[2]
        d['display_status'] = row[3]
        d['cat_count'] = row2cat.Expr1
        objects_list.append(d)
        j = json.dumps(objects_list)

    #data.append([x for x in row]) # or simply data.append(list(row))
    
print  (j)


        

