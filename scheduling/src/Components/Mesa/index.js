import React from 'react';
import Scheduling from '../Scheduling'
import Clients from '../Clients'

import {
  BrowserRouter as Router,
  Switch,
  Route,
} from 'react-router-dom';

export default function Mesa () {
  return (
      <Switch>
          <Route path="/Dashboard/Scheduling">
            <Scheduling />
          </Route>
          <Route path="/Dashboard/Clients">
            <Clients />
          </Route>
          <Route path="/Dashboard">
            {/* <Scheduling /> */}
          </Route>
          {/* <Route path="/SigIn">
            <SigIn />
          </Route>
          <Route path="/Dashboard">
            <Home/>
          </Route> */}
        </Switch>
  );
}