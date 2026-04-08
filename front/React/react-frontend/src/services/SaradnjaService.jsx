import React, { useState, useEffect } from "react";
import axios from "axios";

const SviPredmeti = () => {
  const [korisnici, setKorisnici] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get("https://jsonplaceholder.typicode.com/users");
        setKorisnici(response.data);
      } catch (error) {
        console.error("Greška prilikom dohvatanja korisnika:", error.message);
      }
    };

    fetchData();
  }, []);

  return (
    <div>
      <ul style={{ listStyle: 'none' }}>
        {korisnici.map((korisnik) => (
          <div>
            <li key={korisnik.id} className="list-group-item list-group-item-action list-group-item list-group-item-dark">{korisnik.name} </li>
            <li key={korisnik.id} className="list-group-item list-group-item-action">{korisnik.email}</li>
          </div>
          
        ))}
      </ul>
    </div>
  );
};

export default SviPredmeti;
