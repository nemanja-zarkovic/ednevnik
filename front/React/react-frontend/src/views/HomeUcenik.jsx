import React from 'react'
import NavBar from './NavBar';
import { useNavigate } from "react-router-dom";
import { useEffect } from 'react';
import { useState } from 'react';
import OcenaView from './OcenaView';
import axios from 'axios';

function HomeUcenik() {

    const token = window.sessionStorage.getItem("auth_token");
    const ucenik = window.sessionStorage.getItem("ucenik_id");
    const id = parseInt(ucenik, 10);
    const ime = window.sessionStorage.getItem("ucenik_ime");
    const prezime = window.sessionStorage.getItem("ucenik_prezime");
    const imeprezime = ime+" "+prezime;

    const navigate = useNavigate();
   
    const handleNavigateToOcenaAll = () => {
        navigate("/sve-ocene-ucenik"); 
      };

    let [ocene, setOcene] = useState([]);

    useEffect(() => {
      const fetchData = async () => {
          try {
              const response = await axios.get(`http://127.0.0.1:8000/api/ocene-ucenika/${id}`, {
                  headers: {
                      Authorization: "Bearer " + token,
                  },
              });
              setOcene(response.data.ocene);
          } catch (error) {
              console.log(error);
          }
      };
      fetchData();
  }, [token, id]);
        
      

    if (token === null || ucenik==null) {
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
    <h1 style={{ width: "100%", textAlign: "center", paddingTop: "10px", marginBottom: "20px", paddingBottom:"10px", backgroundColor: "white" }} className='display-2'>{imeprezime}</h1>
      <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "center",  gap: '15px' }}>
      {ocene?.map((ocena) => (
        <OcenaView ocena={ocena} key={ocena.id} style={{ margin: "8px" }}/>
      ))}
       </div>
       <button
        type="button"
        className="btn btn-primary"
        style={{  margin: "0 auto", display: "block", marginTop:"20px"}}
        onClick={handleNavigateToOcenaAll}
      >
        Vidi sve
      </button>
    </div>
  )
}

export default HomeUcenik


