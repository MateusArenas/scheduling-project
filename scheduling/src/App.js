import React from 'react';
import SigIn from './Pages/SigIn';
import Home from './Pages/Home';
import Dashboard from './Pages/Dashboard'
// import { classes } from '@material-ui/core/styles';
import {
  BrowserRouter as Router,
  Switch,
  Route,
} from 'react-router-dom';

export default function App() {
  return (
    <div className="App">
      <Router>
        <Switch>
            <Route path="/Dashboard">
              <Dashboard />
            </Route>
            <Route path="/SigIn">
              <SigIn />
            </Route>
            <Route path="/Home">
              <Home/>
            </Route>
            <Route path="/">
              <SigIn />
            </Route>
          </Switch>
      </Router>
    </div>
  );
}


