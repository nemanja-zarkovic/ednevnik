import React from 'react'
import SaradnjaService from "../services/SaradnjaService";
import NavBar from './NavBar';
import { useState, useEffect } from 'react';
import axios from 'axios';


function Saradnja() {
  const [currentTime, setCurrentTime] = useState('');

  useEffect(() => {
    const intervalId = setInterval(fetchTime, 1000); 


    return () => clearInterval(intervalId);
  }, []);

  const fetchTime = async () => {
    try {
      const response = await fetch('http://worldtimeapi.org/api/timezone/Europe/Belgrade');
      const data = await response.json();
      const dateTime = new Date(data.datetime);
      const formattedDateTime = `${dateTime.toLocaleDateString()}`;
      setCurrentTime(formattedDateTime);
    } catch (error) {
      console.error('Greška pri dohvatanju vremena:', error);
    }
  };



  return (
    <div>
     <NavBar/>

     <div style={{ display: "flex", justifyContent: "center", alignItems: "flex-start" }}>
      <div style={{ width: "50%", display: "flex", flexDirection: "column", alignItems: "center", backgroundColor: "white", padding: "20px" }}>
        <h3>Medjunarodna saradnja</h3>
        <br />
        <p>
          Naša škola saradjuje sa mnogim svetskim univerzitetima. Želja nam je da naši učenici imaju priliku da saradjuju sa uspešnim
          stručnjacima iz različitih oblasti. Ovde možete videti kontakt podatke naših najistaknutijih saradnika. 
        </p>
        <p>
          Budite slobodni da ih kontaktirate u terminu konsultacija ukoliko imate bilo kakva pitanja. Naši učenici već godinama nakon završetka srednjoškolskog obrazovanja
          u velikom broju odlaze na studije u inostranstvo upravo kod naših saradnika.
        </p>
        <p>
        {currentTime}
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.2932111345626!2d20.42571556117308!3d44.81559092636101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a655de1b688c1%3A0x8c74c5663986b082!2zRGVzZXRhIGdpbW5hemlqYSDigJ5NaWhhamxvIFB1cGlu4oCcLCBBbnRpZmHFoWlzdGnEjWtlIGJvcmJlIDHQsCwgQmVvZ3JhZCAxOTA2MjU!5e0!3m2!1sen!2srs!4v1707445716312!5m2!1sen!2srs" style={{width:"100%", height:"400px", style:"border:0;", allowfullscreen:"", loading:"lazy", referrerpolicy:"no-referrer-when-downgrade"}}></iframe>
      </div>
      <div className="list-group" style={{ width: "400px" }}>
        <SaradnjaService />
      </div>
    </div>
  </div>
  )
}

export default Saradnja 

