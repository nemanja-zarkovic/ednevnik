import React from 'react'
import NavBarProfesor from './NavBarProfesor'
import { useNavigate } from 'react-router-dom';
import { useState } from 'react';
import { useEffect } from 'react';
import axios from 'axios';
import OdeljenjaView from './OdeljenjaView';

function HomeProfesor() {

  const navigate = useNavigate();

  const token = window.sessionStorage.getItem("auth_token");
  const profesor = window.sessionStorage.getItem("profesor_id");
  const id = parseInt(profesor, 10);

  const ime = window.sessionStorage.getItem("profesor_ime");
  const prezime = window.sessionStorage.getItem("profesor_prezime");
  const imeprezime = ime+" "+prezime;

  let [odeljenja, setOdeljenja] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
        try {
            const response = await axios.get(`http://127.0.0.1:8000/api/odeljenja-profesora/${id}`, {
                headers: {
                    Authorization: "Bearer " + token,
                },
            });
            setOdeljenja(response.data.data);
        } catch (error) {
            console.log(error);
        }
    };
    fetchData();
}, [token, id]);


if (token === null || profesor==null) {
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
      < NavBarProfesor />
      <h1 style={{ width: "100%", textAlign: "center", paddingTop: "10px", marginBottom: "20px", paddingBottom:"10px", backgroundColor: "white" }} className='display-2'>{imeprezime}</h1>

      <div style={{ display: "flex", flexWrap: "wrap", justifyContent: "center",  gap: '40px' }}>
      {odeljenja?.map((odeljenje) => (
        <OdeljenjaView odeljenje={odeljenje} key={odeljenje.id} style={{ margin: "8px" }}/>
      ))}
       </div>

    </div>
  )
}

export default HomeProfesor
