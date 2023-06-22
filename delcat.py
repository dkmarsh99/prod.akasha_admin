#!C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe

import sys
import requests
import pyodbc 
import time


#while True:


cat_id = sys.argv[1]

run_dir = r'C:/holistic/bookshop/bookdata.accdb'

#print (run_dir)
#connection srings C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe
    
connStr = (
        r"DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};"
        r"DBQ="+run_dir+";"
        )

conn = pyodbc.connect(connStr)

cursor = conn.cursor()  

cursor.execute("delete from web_cat where cat_id =?",cat_id)

cursor.commit()


conn2 = pyodbc.connect(connStr)

cursor2 = conn2.cursor()  

cursor2.execute("delete from isbn_category where cat_id =?",cat_id)

cursor2.commit()

cursor.close()

print ("successful")


