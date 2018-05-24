import React, { Component } from 'react';
import { Input } from 'react-materialize';
import MovieCard from './MovieCard';

class MovieList extends Component {
  constructor(props) {
    super(props);
    this.state = {
      movieList: ''
    }
  }

  handleInputChange(event) {
    fetch(`/api/search/${event.target.value}`)
      .then(response => response.json())
      .then(data => {
        this.setState({
          movieList: data.map(record => <MovieCard key={record.id} title={record.primarytitle}/>)
        });
      });
  }

  render() {
    return (
      <div className="list-container">
        <Input label="Search" onChange={this.handleInputChange.bind(this)}/>
        {this.state.movieList}
      </div>
    );
  }
}

export default MovieList;
