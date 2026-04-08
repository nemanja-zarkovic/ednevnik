import { createContext, useContext, useState } from "react";

const StateContext = createContext({
    user: null,
    token:null,
    role:'',
    setUser: ()=>{},
    setToken:()=>{},
    setRole: ()=>{}
})

export const ContextProvider = ({ children }) => {
    const [user, setUser] = useState({});
    const [token, setToken] = useState(localStorage.getItem("ACCESS_TOKEN"));
    
    const [role, setRole] = useState("");

    const setTokenAndLocalStorage = (token) => {
      setToken(token);
      if (token) {
        localStorage.setItem('ACCESS_TOKEN', token);
      } else {
        localStorage.removeItem('ACCESS_TOKEN');
      }
    }
  
    const setUserAndRole = (userData) => {
      setUser(userData);
    };
  
    const handleRoleChange = (selectedRole) => {
        //if(role){ }
            setRole(selectedRole);
            localStorage.setItem("role", selectedRole);
    };

    const handleLogout = () => {
      // Postavljamo token, korisnika i ulogu na početne vrednosti
      setTokenAndLocalStorage(null);
      setUserAndRole({});
      setRole("");
    };
  
    return (
      <StateContext.Provider value={{
        user,
        token,
        role,
        setUser: setUserAndRole,
        setToken: setTokenAndLocalStorage,
        handleRoleChange,
      }}>
        {children}
      </StateContext.Provider>
    );
  }
  
export const useStateContext = ()=>useContext(StateContext)

