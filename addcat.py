#!C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe

import sys
import requests
import pyodbc 
import time
import json


#while True:

cat_id = sys.argv[1]
dept_id = sys.argv[2]
cat_name = sys.argv[3]


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

cursor.execute("insert into web_cat(cat_id, cat_name, dept_id, display_status) values (?, ?, ?, ?)",cat_id,cat_name,dept_id,'Active')

cursor.commit()

print ("completed")


