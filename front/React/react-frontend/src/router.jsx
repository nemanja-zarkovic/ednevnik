import { Navigate, createBrowserRouter} from "react-router-dom";

import NotFound from "./views/NotFound";
import DefaultLayout from "./components/DefaultLayout";
import GuestLayout from "./components/GuestLayout";

import WelcomePage from "./views/WelcomePage";
import LoginUcenik from "./views/LoginUcenik";
import LoginRoditelj from "./views/LoginRoditelj";
import LoginProfesor from "./views/LoginProfesor";
import HomeUcenik from "./views/HomeUcenik";
import OcenaAll from "./views/OcenaAll";
import PredmetiUcenik from "./views/PredmetiUcenik";
import OcenaPredmet from "./views/OcenaPredmet";
import Saradnja from "./views/Saradnja";
import HomeRoditelj from "./views/HomeRoditelj";
import HomeProfesor from "./views/HomeProfesor";
import OdeljenjeUcenici from "./views/OdeljenjeUcenici";
import OcenaUcenik from "./views/OcenaUcenik";
import LoginAdmin from "./views/LoginAdmin";
import HomeAdministrator from "./views/HomeAdministrator";
import AdminPredmeti from "./views/AdminPredmeti";
import AdminOdeljenja from "./views/AdminOdeljenja";
import AdminProfesori from "./views/AdminProfesori";
import AdminUcenici from "./views/AdminUcenici";
import AdminPromenaOdeljenja from "./views/AdminPromenaOdeljenja";
import AdminOcene from "./views/AdminOcene";
import AdminRegistracija from "./views/AdminRegistracija";
import AdminRegistracijaUcenik from "./views/AdminRegistracijaUcenik";

const router=createBrowserRouter([
    {
        path: "/",
        element: <GuestLayout/>,
        children: [
       
          {
            path: "/pocetna",
            element: <WelcomePage />,
          },
          {
            path: "/",
            element: <WelcomePage />,
          },
          {
            path:"/ucenik-login",
            element:<LoginUcenik/>
          },
          {
            path:"/roditelj-login",
            element:<LoginRoditelj />
          },
          {
            path:"/profesor-login",
            element:<LoginProfesor />
          },
          {
            path:"/admin-login",
            element:<LoginAdmin />
          }

        ],
      },

    {
        path: '/',
        element: <DefaultLayout/>,
        children:[
         
        
            {
                //roditelj
                path:'/home-roditelj',
                element:<HomeRoditelj/>
            },
            {
                //ucenik
                path:'/home-ucenik',
                element:<HomeUcenik/>
            },
            {
                //profesor
                path:'/home-profesor',
                element:<HomeProfesor/>
            },
            {
              //admin
              path:'/home-admin',
              element:<HomeAdministrator/>
            },
            {
                //ucenik
                path:'/sve-ocene-ucenik',
                element:<OcenaAll/>
            },
            {
                //ucenik
                path:'/predmeti-ucenik',
                element:<PredmetiUcenik/>
            },
            {
                //ucenik
                path:'/ocene-iz-predmeta/:predmetId',
                element: <OcenaPredmet/>
            },
            {
                //ucenik
                path:'/saradnja',
                element: <Saradnja/>
            },
            {
                //profesor
                path:'/odeljenje-ucenici',
                element: <OdeljenjeUcenici/>
            },
            {
                //profesor
                path:'/ocene-ucenika',
                element: <OcenaUcenik/>
            },
            {
              //admin
              path:'/admin-predmeti',
                  element: <AdminPredmeti/>
              },
              {
                //admin
                path:'/admin-odeljenja',
                element: <AdminOdeljenja/>
              },
              {
                //admin
                path:'/admin-profesori',
                element: <AdminProfesori/>
              },
              {
                //admin
                path:'/admin-ucenici',
                element: <AdminUcenici/>
              },
              {
                //admin
                path:'/admin-promena-odeljenja',
                element: <AdminPromenaOdeljenja/>
              },
              {
                //admin
                path:'/admin-ocene',
                element: <AdminOcene/>
              },
              {
                //admin
                path:'/admin-registracija',
                element: <AdminRegistracija/>
              },
              {
                //admin
                path:'/admin-registracija-ucenika',
                element: <AdminRegistracijaUcenik/>
              },
        ],
    },
    {
    
            path:'*',
            element:<NotFound/>    
    }


])

export default router;