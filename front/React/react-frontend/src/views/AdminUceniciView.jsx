import React from 'react'
import { Link } from 'react-router-dom'

const AdminUceniciView= ({ ucenik }) => {

    const setUcenik = () => {
        window.sessionStorage.setItem("a_ucenik_id",ucenik.id);
        window.sessionStorage.setItem("a_ucenik_ime",ucenik.ime);
        window.sessionStorage.setItem("a_ucenik_prezime",ucenik.prezime);
        window.sessionStorage.setItem("a_odeljenje_id", ucenik.odeljenjeId);
        window.sessionStorage.setItem("a_odeljenje", ucenik.odeljenje);
      };

        return (
            
            <tbody>
            <tr key={ucenik.id}>
                <td>{ucenik.id}</td>
                <td>
                    <Link className="nav-link" to="/admin-promena-odeljenja" onClick={setUcenik}  style={{ color: 'navy'}}>
                        {ucenik.ime} {ucenik.prezime}</Link></td>
                <td>  {ucenik.odeljenje}</td>
            </tr>
            </tbody>
        )
}

export default AdminUceniciView


  //      <Link className="nav-link card-header" to="/home-ucenik" onClick={setUcenikHome}  style={{ color: 'navy', fontSize: '24px' }}>{dete.ime} {dete.prezime}</Link>
     