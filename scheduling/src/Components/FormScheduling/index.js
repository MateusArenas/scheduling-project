import React from 'react';
import Avatar from '@material-ui/core/Avatar';
import Button from '@material-ui/core/Button';
import TextField from '@material-ui/core/TextField';
import FormControlLabel from '@material-ui/core/FormControlLabel';
import Checkbox from '@material-ui/core/Checkbox';
import Link from '@material-ui/core/Link';
import Grid from '@material-ui/core/Grid';
import LockOutlinedIcon from '@material-ui/icons/LockOutlined';
import Typography from '@material-ui/core/Typography';
import { makeStyles } from '@material-ui/core/styles';

const useStyles = makeStyles(theme => ({
  paper: {
    marginTop: theme.spacing(8),
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
  },
  avatar: {
    margin: theme.spacing(1),
    backgroundColor: theme.palette.secondary.main,
  },
  form: {
    width: '100%', // Fix IE 11 issue.
    marginTop: theme.spacing(3),
  },
  submit: {
    margin: theme.spacing(3, 0, 2),
  },
}));

export default function FormScheduling(props) {
  const classes = useStyles();
  const [cpf,setCpf] = React.useState('');
  const [status,setStatus] = React.useState('');
  const [date,setDate] = React.useState('');

  function changeTextDate(value) {
    setDate(value);
  }

  function changeTextCpf(value) {
    setCpf(value);
  }

  function changeTextStatus (value) {
    setStatus(value);
  }

  function handleSubmit(event) {
    // event.preventDefault();
    if (cpf.length && status.length && date.length) fetchData();
  }

  async function fetchData() {
    var myHeaders = new Headers();
    var myInit = { method: 'GET', headers: myHeaders, mode: 'cors'};

    const response = await fetch(`${props.file}?cpf=${cpf}&status=${status}&date=${date}`, myInit);
    const data = await response.json();
    console.log(data);
    // setSchedulings(data);
  }

  return (
        <form className={classes.form} >
          <Grid container spacing={2}>
            <Grid item xs={12} sm={12}>
              <TextField
                value={cpf}
                onChange={(event) => changeTextCpf(event.target.value)}
                variant="outlined"
                required
                fullWidth
                id="cpf"
                label="CPF"
                name="cpf"
                autoComplete="cpf"
              />
            </Grid>
            <Grid item xs={6}>
              <TextField
                value={status}
                onChange={(event) => changeTextStatus(event.target.value)}
                variant="outlined"
                required
                fullWidth
                id="status"
                label="Status"
                name="status"
              />
            </Grid>
            <Grid item xs={6}>
              <TextField
                value={date}
                onChange={(event) => changeTextDate(event.target.value)}
                variant="outlined"
                required
                fullWidth
                name="date"
                label="Date"
                id="date"
              />
            </Grid>
          </Grid>
          <Button
            type="submit"
            fullWidth
            variant="contained"
            color="primary"
            className={classes.submit}
            onClick={handleSubmit}
          >
            Create Client
          </Button>
        </form>
  );
}