import styled from 'styled-components';
import { Container, Col } from 'styled-bootstrap-grid';
import { Button } from '@material-ui/core';
import Modal from 'styled-react-modal';

export const RPN = styled(Container)`
  padding-top: 30px;
  border-top: 1px solid #333;
  margin-top: 25px;
  .required {
    color: #009b94;
  }
  .validateFailed {
    border-color: red;
  }
  ${Col} {
    padding-top: 30px;
    padding-bottom: 30px;
    border-bottom: 1px solid #d9dee5;
  }
  .MuiRadio-colorSecondary.Mui-checked,
  .MuiCheckbox-colorSecondary.Mui-checked {
    color: #009b94;
  }
  .etcField {
    border: 1px solid #d9dee5;
    padding: 20px;
    font-size: 18px;
    line-height: 1.56;
    letter-spacing: -0.9px;
    text-align: left;
    color: #333;
    border-radius: 4px;
  }
`;

const Input = styled.input`
  border: none;
  outline: none;
  padding: 4px;
  border: 1px solid #d9dee5;
  padding: 20px;
  border-radius: 4px;
  width: 100%;
  &::placeholder {
    color: #cac1c8;
  }
`;

const AddressBase = styled(Input)`
  cursor: default;
`;
Input.Postcode = styled(AddressBase)`
  width: 120px;
  margin-right: 8px;
`;
Input.Address = styled(AddressBase)`
  margin-right: 8px;
  width: auto;
`;

const Btn = styled(Button)`
  border: none;
  box-shadow: none !important;
  line-height: 1 !important;
  padding: 20px !important;
`;

const Label = styled.label`
  display: flex;
  flex-direction: column;
  .name {
    margin-bottom: 15px;
    display: inline-flex;
    align-items: center;
    line-height: 1;
    cursor: pointer;
    span:last-child {
      font-family: NotoSansKR;
      font-size: 18px;
      font-weight: bold;
      letter-spacing: -0.9px;
      text-align: left;
    }
  }
  .name span:not(:last-child) {
    margin-right: 4px;
  }
`;

export const ErrorMessage = styled.span`
  display: inline-block;
  color: red;
  padding: 8px 0;
`;

export const PPC = styled.div`
  .tableWrap {
    max-height: 280px;
    overflow-y: scroll;
    border: 1px solid #d9dee5;
    padding: 20px;
    font-size: 18px;
    line-height: 1.56;
    letter-spacing: -0.9px;
    text-align: left;
    color: #333;
    border-radius: 4px;
    background-color: #fff;
  }
  table.main {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto;
    border-spacing: 2px;
  }
  .small {
    font-size: 0.8rem;
  }
`;

export const BtnWrap = styled.div`
  padding-top: 30px;
  padding-bottom: 30px;
  display: flex;
  justify-content: center;
  ${Btn} {
    padding: 27px 27px 29px;
    width: 100%;
    max-width: 300px;
    text-align: center;
    font-family: NotoSansKR;
    font-size: 24px;
    font-weight: bold;
    line-height: 1.2;
    letter-spacing: -1.2px;
    text-align: center;
    color: #fff;
    background-color: #009b94;
    border-radius: 0;
  }
`;

export { Input, Btn, Label };

export const StyledModal = Modal.styled`
  max-width: 320px;
  width: 100%;
`;
export const SuccessModal = Modal.styled`
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  color: #333333;
  text-align: center;
  padding-top: 60px;
  h1 {
    font-family: NotoSansKR;
    font-size: 52px;
    font-weight: bold;
    letter-spacing: -2.6px;
    margin-bottom: 54px;
    margin-top: 0;
  }
  p {
    font-family: NotoSansKR;
    font-size: 24px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: -1.2px;
    margin-bottom: 54px;
  }
  button {
    cursor: pointer;
    outline: none;
    box-shadow: none;
    border: none;
    width: 100%;
    padding: 25px 0;
    background-color: #009b94;
    font-family: NotoSansKR;
    font-size: 24px;
    font-weight: bold;
    letter-spacing: -1.2px;
    color: #fff;
  }
`;
export const FailModal = Modal.styled`
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  color: #333333;
  text-align: center;
  padding-top: 60px;
  h1 {
    font-family: NotoSansKR;
    font-size: 52px;
    font-weight: bold;
    letter-spacing: -2.6px;
    margin-bottom: 54px;
    margin-top: 0;
  }
  p {
    font-family: NotoSansKR;
    font-size: 24px;
    font-weight: normal;
    font-stretch: normal;
    font-style: normal;
    line-height: normal;
    letter-spacing: -1.2px;
    margin-bottom: 54px;
  }
  button {
    cursor: pointer;
    outline: none;
    box-shadow: none;
    border: none;
    width: 100%;
    padding: 25px 0;
    background-color: #009b94;
    font-family: NotoSansKR;
    font-size: 24px;
    font-weight: bold;
    letter-spacing: -1.2px;
    color: #fff;
  }
`;
