import React from 'react';
import '../style/WelcomePage.css';
import { useNavigate } from 'react-router-dom';

function WelcomePage() {

  const token = window.sessionStorage.getItem("auth_token");

  return (
    <div>
      
      <div
        id="intro-example"
        className="p-5 text-center bg-image"
      >

        <div style={{ display:"flex", justifyContent:"right"}}> 
             <a
                data-mdb-ripple-init
                className="text-white small"
                href="/admin-login"
                target="_blank"
                role="button"
              >
                Admin
              </a>
        </div>

        <div className="mask">
          <div className="d-flex justify-content-center align-items-center h-100">
            <div className="text-white">
              <h1 className="mb-3">eDnevnik</h1>
              <h5 className="mb-4">Deseta beogradska gimnazija “Mihajlo Pupin”</h5>
              <a
                data-mdb-ripple-init
                className="btn btn-outline-light btn-lg m-2"
                href="/roditelj-login"
                role="button"
                rel="nofollow"
                target="_blank"
              >
                eRoditelj
              </a>
              <a
                data-mdb-ripple-init
                className="btn btn-outline-light btn-lg m-2"
                href="/ucenik-login"
                target="_blank"
                role="button"
              >
                eUčenik
              </a>
              <a
                data-mdb-ripple-init
                className="btn btn-outline-light btn-lg m-2"
                href="/profesor-login"
                target="_blank"
                role="button"
              >
                eProfesor
              </a>

          
            </div>
           
          </div>
         
         
        </div>
      </div>
    </div>
  );
}

export default WelcomePage;
