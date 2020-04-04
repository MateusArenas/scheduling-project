import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Popover from '@material-ui/core/Popover';
import Typography from '@material-ui/core/Typography';
import Button from '@material-ui/core/Button';
import IconButton from '@material-ui/core/IconButton';
import EditIcon from '@material-ui/icons/Edit';
import Fab from '@material-ui/core/Fab';

const useStyles = makeStyles(theme => ({
  seeMore: {
    margin: theme.spacing(1),
  },
  actionButton: {
  }
}));

export default function SimplePopover(props) {
  const classes = useStyles();

  const [anchorEl, setAnchorEl] = React.useState(null);

  React.useEffect(() => {
    if (Boolean(props.close)) handleClick(props.close);
  }, [props.close]);

  const handleClick = event => {
    setAnchorEl(event.currentTarget);
  };

  const handleClose = () => {
    setAnchorEl(null);
  };


  const open = Boolean(anchorEl);
  const id = open ? 'simple-popover' : undefined;

  return (
    < >
      <IconButton className={classes.actionButton} size="small" fontSize="small" onClick={handleClick}>
        <EditIcon size="small" fontSize="small" />
      </IconButton>
      <Popover
        id={id}
        open={open}
        anchorEl={anchorEl}
        onClose={handleClose}
        anchorOrigin={{
          vertical: 'top',
          horizontal: 'center',
        }}
        transformOrigin={{
          vertical: 'bottom',
          horizontal: 'center',
        }}
      >
          {props.content}
      </Popover>
    </>
  );
}