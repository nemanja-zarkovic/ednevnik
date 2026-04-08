import React, { useState } from 'react';
import axios from 'axios';
import { Link, useNavigate } from "react-router-dom";
import NavBar from './NavBar';
import PredmetiUcenikView from './PredmetiUcenikView';
import { useEffect } from 'react';

function PredmetiUcenik() {

    const token = window.sessionStorage.getItem("auth_token");
    const ucenik = window.sessionStorage.getItem("ucenik_id");
    const id = parseInt(ucenik, 10);

    const navigate = useNavigate();

    let [predmeti, setPredmeti] = useState([]);

    useEffect(() => {
      if (token && id) {

    let config = {
        method: "get",
        url: 'http://127.0.0.1:8000/api/predmeti-ucenika/'+id,
        headers: {
          Authorization: "Bearer " + token,
        },
      };
    
      axios
        .request(config)
        .then((response) => {
        console.log(response);
        setPredmeti(response.data.data);
        })
        .catch((error) => {
          console.log(error);
        });
      } else {
        navigate("/pocetna");
    }
}, [token, id, navigate]);

const handleExportToPdf = () => {
  if (id) {
    axios
      .get('http://127.0.0.1:8000/api/eksport-ocena/'+id, { 
        headers: {
          Authorization: `Bearer ${token}`,
        },
        responseType: 'arraybuffer',
      })
      .then((response) => {
        const blob = new Blob([response.data], { type: 'application/pdf' });
        const url = window.URL.createObjectURL(blob);
        window.open(url);
      })
      .catch((error) => {
        console.log(error);
      });
  }
};

        if (token === null || ucenik == null) {
            return (
              <div
                style={{
                  display: "flex",
                  flexDirection: "column",
                  alignItems: "center",
                  justifyContent: "center",
                  height: "100vh",
                }}
              >
                <h5>Vratite se na login stranicu i pokušajte ponovo.</h5>
                <button
                  type="button"
                  className="btn btn-primary"
                  data-mdb-ripple-init
                  style={{ marginTop: "16px" }}
                  onClick={() => navigate("/pocetna")}
                >
                  Login stranica
                </button>
              </div>
            );
        }



  return (
    <div>
      <NavBar/>
      <h1 style={{ width: "100%", textAlign: "center", paddingTop: "10px", marginBottom: "20px", paddingBottom:"10px", backgroundColor: "white" }}>Predmeti u tekućoj školskoj godini</h1>
     
      <div style={{display: "flex", justifyContent:"center", paddingTop:"5px", paddingBottom:"20px"}}>
      <button
        type="button"
        className="btnEksportujOcene"
        data-mdb-ripple-init
        onClick={handleExportToPdf}>
        Preuzmi ocene</button>
        </div>

      <div className="list-group" style={{width:"400px",  margin: "0 auto" }}>
      {predmeti?.map((predmet) => (
        
        <PredmetiUcenikView predmet={predmet} key={predmet.id} style={{ margin: "8px",  display: "flex", justifyContent:"center" }}/>
      ))}
       </div>

    </div>
  )
}

export default PredmetiUcenik
