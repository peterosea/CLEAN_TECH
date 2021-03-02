import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import { createGlobalStyle } from 'styled-components';
import { ModalProvider } from 'styled-react-modal';

const GlobalCss = createGlobalStyle`
  * {
    box-sizing: border-box;
  }
`;

ReactDOM.render(
  <React.StrictMode>
    <ModalProvider>
      <GlobalCss />
      <App />
    </ModalProvider>
  </React.StrictMode>,
  document.getElementById('root'),
);
