import React from 'react'
import { Link } from 'react-router-dom'
import { useEffect } from 'react';
import axios from 'axios';

const AdminUceniciView= ({ ocena }) => {


    const token = sessionStorage.getItem("auth_token");

    const deleteGrade = async () => {
        try {
          const response = await axios.delete(
            `http://127.0.0.1:8000/api/obrisi-ocenu/${ocena.ucenikId}/${ocena.predmetId}/${ocena.razred}/${ocena.datum}`,
            {
              headers: {
                Authorization: "Bearer " + token,
              },
            }
          );
          window.location.reload();
        } catch (error) {
          console.log(error);
        }
      };
       // http://127.0.0.1:8000/api/obrisi-ocenu/1/1/1/2023-09-13

 //      Route::delete('/obrisi-ocenu/{ucenikId}/{predmetId}/{razredId}/{datum}


        return (
            
            <tbody>
            <tr key={ocena.datum}>
                <td>{ocena.datum}</td>
                <td>  {ocena.ocena} </td>
                <td>  {ocena.ucenik.ime} {ocena.ucenik.prezime}</td>
                <td>  {ocena.profesor.predmet}</td>
                <td>  {ocena.opis}</td>
                <td>  {ocena.profesor.ime} {ocena.profesor.prezime}</td>
                <td> <Link className="nav-link" to="/admin-ocene" onClick={deleteGrade}  style={{ color: 'red'}}> Obriši ocenu </Link> </td>

            </tr>
            </tbody>
        )
}

export default AdminUceniciView