from pymongo import MongoClient
import certifi

MONGO_URL = 'mongodb+srv://eduardo_sa:Cop07234EDU@system-ptmx.z3a6sag.mongodb.net/?retryWrites=true&w=majority'

ca = certifi.where()

def dbConection():
    try:
        client = MongoClient(MONGO_URL,tlsCAfile=ca)
        db = client['AVI-ADMIN']
    except ConnectionError:
        print("error con la conexion de la bd")
    return db

    