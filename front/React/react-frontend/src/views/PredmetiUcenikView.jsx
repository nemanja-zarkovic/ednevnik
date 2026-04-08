import React from 'react'
import axios from 'axios'
import { useState } from 'react';
import { useEffect } from 'react';
import { Link } from 'react-router-dom';

const PredmetiUcenikView = ({ predmet }) => {

  const token = window.sessionStorage.getItem("auth_token");
  const odeljenje = window.sessionStorage.getItem("odeljenje_id");
  const id = parseInt(odeljenje, 10);

  let [profesor, setProfesor] = useState([]);

  useEffect(() => {
    const fetchProfesor = async () => {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/profesori-odeljenja/${id}/predmet/${predmet.id}`, {
          headers: {
            Authorization: "Bearer " + token,
          },
        });
        const { ime, prezime } = response.data.profesor;
        setProfesor(`${ime} ${prezime}`);
      } catch (error) {
        console.log(error);
      }
    };
    fetchProfesor();
  }, [token, id, predmet.id]);

  return (
    <div>
        <Link to={`/ocene-iz-predmeta/${predmet.id}`} className="list-group-item list-group-item-action list-group-item list-group-item-dark">{predmet.naziv}</Link>
        <Link to={`/ocene-iz-predmeta/${predmet.id}`} className="list-group-item list-group-item-action">{profesor}</Link>
    </div>
      
  )
}

export default PredmetiUcenikView


