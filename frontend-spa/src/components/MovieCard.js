import React, { Component } from 'react';
import { Card } from 'react-materialize';

class MovieCard extends Component {
  constructor(props) {
    super(props);
    this.state = {
      title: props['title']
    }
  }

  render() {
    return (
      <Card className='blue-grey darken-1'
            textClassName='white-text'
            title={this.state.title}/>
    );
  }
}

export default MovieCard;
