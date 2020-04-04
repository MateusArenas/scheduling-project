import React from 'react';
import Grid from '@material-ui/core/Grid';
import Tabs from '../Tabs';
import Paper from '@material-ui/core/Paper';
import Orders from '../Dashboard/Orders';
import { makeStyles } from '@material-ui/core/styles';
import IconButton from '@material-ui/core/IconButton';
import Fab from '@material-ui/core/Fab';
import AddIcon from '@material-ui/icons/Add';

import Modal from '../Modal';
import FormSignUp from '../FormSignUp';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  useParams,
  useRouteMatch
} from "react-router-dom";

const useStyles = makeStyles(theme => ({
  paper: {
    padding: theme.spacing(2),
    display: 'flex',
    overflow: 'auto',
    flexDirection: 'column',
  },
  fab: {
    position: 'absolute',
    bottom: theme.spacing(2),
    right: theme.spacing(2),
  },
}));


export default function Clients () {
  const classes = useStyles();
  const fab =  {
    color: 'primary',
    className: classes.fab,
    icon: <AddIcon />,
    label: 'Add',
  };
  const [clients, setClients] = React.useState([]);

  React.useEffect(() => {
    fetchData();
  }, []);

  async function fetchData() {
    var myHeaders = new Headers();
    var myInit = { method: 'GET', headers: myHeaders, mode: 'cors', };

    const response = await fetch('http://localhost/projects/scheduling-project/scheduling/src/Api/AJAX/clients/all.php',myInit);
    const data = await response.json();
    console.log(data);
    setClients(data);
  }
  
  const rejectKeys = { id: true, createAt: true, updateAt: true };
  return (
    <Grid container spacing={3}>
    <Tabs tabs={[() => (
      <>
        <Grid item xs={12}>
          <Paper className={classes.paper}>
           <Orders 
            data={clients}
            rejectKeys={rejectKeys}
           />  
          </Paper>
        </Grid>
      </>
    )]}>
      </Tabs>
      <Modal
        buttonClassName={fab.className}
        buttonContent={
          <Fab aria-label={fab.label} color={fab.color}>
            {fab.icon}
          </Fab>
        }
        content={<FormSignUp file={"http://localhost/projects/scheduling-project/scheduling/src/Api/AJAX/clients/add.php"}/>}
      />
    </Grid>
  );
}