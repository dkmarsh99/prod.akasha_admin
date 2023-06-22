#!C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe

import sys
import requests
import pyodbc 
import time
import json


#while True:

dept_id = sys.argv[1]
dept_name = sys.argv[2]

#print (dept_name)

#print (dept_id)

#print ("test222")

local_run_mode = 'test'

run_dir = r'C:/holistic/bookshop/bookdata.accdb'

#print (run_dir)
#connection srings C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe
    
connStr = (
        r"DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};"
        r"DBQ="+run_dir+";"
        )

conn = pyodbc.connect(connStr)
     
cursor = conn.cursor()  

cursor.execute("insert into web_dept(dept_id, dept_name, display_status) values (?, ?, ?)",dept_id,dept_name,'Active')

cursor.commit()

print ("completed")


