

from py122u import nfc
import requests

def lire_uid():
    try:
        reader = nfc.Reader()
        reader.connect()
        uid = reader.get_uid()
        reader.disconnect()
        return uid
    except Exception as e:
        return str(e)

if __name__ == "__main__":
    uid = lire_uid()
    print(f"UID lu: {uid}")

    # URL de votre endpoint Laravel
    url = "http://127.0.0.1:8000/save-card/" + uid  # Mettez à jour l'URL avec l'adresse de votre application Laravel

    # Envoyez une requête POST pour enregistrer la carte
    response = requests.post(url)

    # Affichez la réponse
    print(response.json())
