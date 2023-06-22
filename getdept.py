#!C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe

import sys
import requests
import pyodbc 
import time
import json

#while True:


dept_id = sys.argv[1]


run_dir = r'C:/holistic/bookshop/bookdata.accdb'


#connection srings C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe
    
connStr = (
        r"DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};"
        r"DBQ="+run_dir+";"
        )
conn = pyodbc.connect(connStr)
     
cursorboadd = conn.cursor()     

data = []

cursorboaddsql = "SELECT * from web_dept where dept_id <> ?"
params_send = (
    dept_id
)

cursorboadd.execute(cursorboaddsql , params_send)                

rows = cursorboadd.fetchall()
for row in rows:
    data.append([x for x in row]) # or simply data.append(list(row))
    
print  (json.dumps(data))

#print(data)
#for rowboadd in cursorboadd.fetchall():
        
#    print(rowboadd)
        

