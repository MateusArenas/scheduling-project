import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import TextField from '@material-ui/core/TextField';
import Button from '@material-ui/core/Button';
import Divider from '@material-ui/core/Divider';


const useStyles = makeStyles(theme => ({
  root: {
    display: 'flex',
    justifyContent: 'center',
    alignItems: 'center',
    flexDirection: 'column',
    '& > *': {
      margin: theme.spacing(1),
      width: 300,
    }
  },
}));

export default function Form() {
  const classes = useStyles();

  return (
    <form className={classes.root} noValidate autoComplete="off">
      <label>LogIn</label>
      <Divider />
      <TextField
          id="standard-email-input"
          label="Email"
          type="email"
          variant="outlined"
        />
      {/* <Input placeholder="Placeholder" inputProps={{ 'aria-label': 'description' }} />
      <Input defaultValue="Disabled" disabled inputProps={{ 'aria-label': 'description' }} />
      <Input defaultValue="Error" error inputProps={{ 'aria-label': 'description' }} /> */}
      <TextField
          id="standard-password-input"
          label="Senha"
          type="password"
          autoComplete="current-password"
          variant="outlined"
        />
        <Divider />
        <Button variant="outlined" type="submit" color="primary">Entrar</Button>
    </form>
  );
}