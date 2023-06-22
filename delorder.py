#!C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe

import sys
import requests
import pyodbc 
import time


#while True:


st_id = sys.argv[1]


run_dir = r'D:/holistic/bookshop/bookdata.accdb'

#run_dir = r'C:/holistic/bookshop/bookdata.accdb'

#print (run_dir)
#connection srings C:\Users\Akasha\AppData\Local\Programs\Python\Python39-32\python.exe C:\Users\davidmarsh\AppData\Local\Programs\Python\Python39-32\python.exe
    
connStr = (
        r"DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};"
        r"DBQ="+run_dir+";"
        )

conn = pyodbc.connect(connStr)

cursor = conn.cursor()  

cursor.execute("delete from sales_txn where p_status = 'Order Prep' and sales_id=?",st_id)

cursor.commit()

cursor.close()




print ("successful")


