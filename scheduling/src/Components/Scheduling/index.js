import React from 'react';
import Grid from '@material-ui/core/Grid';
import Tabs from '../Tabs';
import Paper from '@material-ui/core/Paper';
import Orders from '../Dashboard/Orders';
import { makeStyles } from '@material-ui/core/styles';
import Modal from '../Modal';
import FormScheduling from '../FormScheduling';

import Fab from '@material-ui/core/Fab';
import AddIcon from '@material-ui/icons/Add';
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


export default function Scheduling () {
  const classes = useStyles();
  const fab =  {
    color: 'primary',
    className: classes.fab,
    icon: <AddIcon />,
    label: 'Add',
  };
  const [schedulings, setSchedulings] = React.useState([]);

  React.useEffect(() => {
    fetchData();
  }, []);

  async function fetchData() {
    var myHeaders = new Headers();
    var myInit = { method: 'GET', headers: myHeaders, mode: 'cors', };

    const response = await fetch('http://localhost/projects/scheduling-project/scheduling/src/Api/AJAX/scheduling/all.php',myInit);
    const data = await response.json();
    console.log(data);
    setSchedulings(data);
  }
  
  const rejectKeys = { id: true, createAt: true, updateAt: true, userId: true };
  return (
    <Grid container spacing={3}>
    <Tabs tabs={[() => (
      <>
        <Grid item xs={12}>
          <Paper className={classes.paper}>
           <Orders 
              rejectKeys={rejectKeys}
              data={schedulings}
           />  
          </Paper>
        </Grid>
      </>
    )]}>
    {/* Chart */}
    {/* <Grid item xs={12} md={8} lg={9}>
      <Paper className={fixedHeightPaper}>
        <Chart />
      </Paper>
    </Grid> */}
    {/* Recent Deposits */}
    {/* <Grid item xs={12} md={4} lg={3}>
      <Paper className={fixedHeightPaper}>
        <Deposits />
      </Paper>
    </Grid> */}
    {/* Recent Orders */}
      </Tabs>
      <Modal
        buttonClassName={fab.className}
        buttonContent={
          <Fab aria-label={fab.label} color={fab.color}>
            {fab.icon}
          </Fab>
        }
        content={<FormScheduling file={"http://localhost/projects/scheduling-project/scheduling/src/Api/AJAX/scheduling/add.php"}/>}
      />
    </Grid>
  );
}