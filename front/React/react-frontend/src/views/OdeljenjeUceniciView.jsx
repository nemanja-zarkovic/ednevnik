import React, { useState } from 'react';
import axios from 'axios';
import { Link, useNavigate } from "react-router-dom";
import NavBar from './NavBar';
import PredmetiUcenikView from './PredmetiUcenikView';
import { useEffect } from 'react';

const OdeljenjeUceniciView= ({ ucenik }) => {

    const setUcenik = () => { 
        window.sessionStorage.setItem("p_ucenik_id",ucenik.id);
        window.sessionStorage.setItem("p_ucenik_ime", ucenik.ime);
        window.sessionStorage.setItem("p_ucenik_prezime",ucenik.prezime);
    }

  return (
    <div>
       <Link to={'/ocene-ucenika'} onClick={setUcenik} className="list-group-item list-group-item-action">{ucenik.prezime} {ucenik.ime}</Link>
    </div>
  )
}

export default OdeljenjeUceniciView