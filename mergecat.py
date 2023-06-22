#!C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe

import sys
import requests
import pyodbc 
import time


#while True:


cat_from = sys.argv[1]
cat_to = sys.argv[2]


run_dir = r'D:/holistic/bookshop/bookdata.accdb'

#print (run_dir)
#connection srings C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe
    
connStr = (
        r"DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};"
        r"DBQ="+run_dir+";"
        )

conn = pyodbc.connect(connStr)

cursor = conn.cursor()  

cursor.execute("update isbn_category set cat_id = ? where cat_id =?",cat_to, cat_from)

cursor.commit()

cursor.close()

cursor2 = conn.cursor()  

cursor2.execute("delete from web_cat where cat_id = ?",cat_from)

cursor2.commit()

cursor2.close()

print ("successful")


