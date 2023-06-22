#!C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe

import sys
import requests
import pyodbc 
import time


#while True:


cat_id = sys.argv[1]
cat_name = sys.argv[2]

run_dir = r'D:/holistic/bookshop/bookdata.accdb'

#print (run_dir)
#connection srings C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe
    
connStr = (
        r"DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};"
        r"DBQ="+run_dir+";"
        )

conn = pyodbc.connect(connStr)

cursor = conn.cursor()  

cursor.execute("update web_cat set cat_name = ? where cat_id =?",cat_name, cat_id)

cursor.commit()

cursor.close()

print ("successful")


