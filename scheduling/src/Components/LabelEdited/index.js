import React from 'react';
import SimplePapover from '../SimplePapover';
import TextField from '@material-ui/core/TextField';
import { makeStyles } from '@material-ui/core/styles';
import TableCell from '@material-ui/core/TableCell';
import SaveIcon from '@material-ui/icons/Save';
import Button from '@material-ui/core/Button';
import IconButton from '@material-ui/core/IconButton';
import Divider from '@material-ui/core/Divider';
import ButtonGroup from '@material-ui/core/ButtonGroup';
import CancelPresentationIcon from '@material-ui/icons/CancelPresentation';
import Paper from '@material-ui/core/Paper';
import { Typography } from '@material-ui/core';

const useStyles = makeStyles(theme => ({
  root: {
    padding: theme.spacing(1),
    display: 'flex',
    alignItems: 'center',
    width: 400,
  },
  input: {
    marginLeft: theme.spacing(1),
    flex: 1,
  },
  iconButton: {
    padding: 10,
  },
  iconButtonFirst: {
    padding: 10,
    marginLeft: theme.spacing(1),
  },
  divider: {
    height: 28,
    margin: 4,
  },
  cell: {
    justifyContent: 'center',
    verticalAlign: 'middle; !important',
    textAlign: 'initial'
  },
  label: {
    verticalAlign: 'center',
    textAlign: '-webkit-left',
    display: 'inline-table',
    marginRight: theme.spacing(2)
  },
  popover: {
    display: 'inline-table',
  }
}));
export default function LabelEdited (props) {
  const classes = useStyles();
  const [anchorEl, setAnchorEl] = React.useState(null);

  const handleClick = event => {
    setAnchorEl(event.currentTarget);
  };

  return (
      <TableCell className={classes.cell}>
        <Typography className={classes.label}>
          {props.content}
        </Typography> 
        <SimplePapover className={classes.popover}
          close={anchorEl}
          content={
          <Paper component="form" className={classes.root}>
            <TextField className={classes.input}
              required id="standard-required" 
              label={props.label}
              defaultValue={props.content} 
              variant="outlined"
              size="small"
            />
            <IconButton type="submit" className={classes.iconButtonFirst} size="small"><SaveIcon/></IconButton>
            <Divider className={classes.divider} orientation="vertical" />
            <IconButton onClick={handleClick} className={classes.iconButton} size="small"><CancelPresentationIcon/></IconButton>
          </Paper>
        } />
      </TableCell>
  );
}