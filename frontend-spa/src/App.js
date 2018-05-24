import React, { Component } from 'react';
import './App.css';
import MovieList from './components/MovieList';

class App extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <h1 className="App-title">Sample IMDB Data</h1>
        </header>
        <MovieList/>
      </div>
    );
  }
}

export default App;
