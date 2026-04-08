import React, { useState } from 'react';
import axios from 'axios';
import { Link, useNavigate } from "react-router-dom";
import OdeljenjeUceniciView from './OdeljenjeUceniciView';
import { useEffect } from 'react';
import NavBarProfesor from './NavBarProfesor';

function OdeljenjeUcenici() {
    const token = window.sessionStorage.getItem("auth_token");
    const profesor = window.sessionStorage.getItem("profesor_id");
    const odeljenje = window.sessionStorage.getItem("odeljenje_id");
    const id = parseInt(odeljenje, 10);
  
    const razred = window.sessionStorage.getItem("odeljenje_razred");
    const indeks = window.sessionStorage.getItem("odeljenje_indeks");
  
    const navigate = useNavigate();
  
    const [ucenici, setUcenici] = useState([]);
    const [sortOrder, setSortOrder] = useState("asc");
  
    useEffect(() => {
      if (token && id) {
        let config = {
          method: "get",
          url: `http://127.0.0.1:8000/api/ucenici-odeljenja/${id}`,
          headers: {
            Authorization: "Bearer " + token,
          },
        };
  
        axios
          .request(config)
          .then((response) => {
            console.log(response);
            setUcenici(response.data.data);
          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        navigate("/pocetna");
      }
    }, [token, id, navigate]);
  
    const toggleSortOrder = () => {
      setSortOrder(sortOrder === "asc" ? "desc" : "asc");
    };
  
    if (token === null || profesor == null) {
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
        <NavBarProfesor />
        <h1 style={{ width: "100%", textAlign: "center", paddingTop: "10px", marginBottom: "20px", paddingBottom: "10px", backgroundColor: "white" }}>Odeljenje {razred}-{indeks}</h1>
        
        <div style={{ display: "flex", justifyContent: "center", alignItems: "flex-start", gap:"30px", height:"100vh"}}>
       
        <button className="btn btn-primary" style={{ width: "250px"}} onClick={toggleSortOrder}>
          Sortiraj po prezimenu ({sortOrder === "asc" ? "A-Ž" : "Ž-A"})
        </button>
   

        <div style={{ width: "400px"}}>
          {ucenici
            .sort((a, b) => {
              if (sortOrder === "asc") {
                return a.prezime.localeCompare(b.prezime);
              } else {
                return b.prezime.localeCompare(a.prezime);
              }
            })
            .map((ucenik) => (
              <OdeljenjeUceniciView ucenik={ucenik} key={ucenik.id} style={{ margin: "8px", display: "flex", justifyContent: "center" }} />
            ))}
        </div>
      </div>

      </div>
    );
  }
  
  export default OdeljenjeUcenici 