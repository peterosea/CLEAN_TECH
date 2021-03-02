import { useState, useRef } from 'react';
import { useForm, Controller } from 'react-hook-form/dist/index.ie11';
import { GridThemeProvider, Row, Col } from 'styled-bootstrap-grid';
import { FaStar } from 'react-icons/fa';
import {
  RadioGroup,
  FormControlLabel,
  Radio,
  FormControl,
  TextareaAutosize,
  TextField,
} from '@material-ui/core';
import Autocomplete from '@material-ui/lab/Autocomplete';
// components
import Grid from './grid';
import {
  RPN,
  Input,
  ErrorMessage,
  Label,
  Btn,
  BtnWrap,
  StyledModal,
  SuccessModal,
  FailModal,
} from './AppStyle';
import Postcode from './PostCode';
import PrivacyPolicy from './PrivacyPolicy';
import LocationFilter from './locationFilter';
import equipmentOptions from './equipment-options';

function App() {
  const { handleSubmit, register, errors, control } = useForm();
  const [values, setValues] = useState({
    data: undefined,
    addressModalOpen: false,
    address: false,
    etcValue: '',
  });
  const [success, setSuccess] = useState(false);
  const [fail, setFail] = useState(false);
  const product = useRef();

  function toggleModal() {
    setValues({ ...values, addressModalOpen: !values.addressModalOpen });
  }

  function completePostCode(res) {
    const { fullAddress, zonecode } = res;
    setValues({
      ...values,
      addressModalOpen: !values.addressModalOpen,
      address: { fullAddress, zonecode },
    });
  }

  const onSubmit = (_values) => {
    const result = Object.assign({}, _values);
    setValues({ ...values, data: result });
    const Form = new FormData();
    result['00N9000000Do9fa'] = LocationFilter(result.location);
    result['orgid'] = '00D90000000kgNF';
    result['00N9000000Do9g4'] = 1;
    result['submit'] = '제출';
    result['00N9000000Do9fp'] = product.current.querySelector(
      'input[name="00N9000000Do9fp"]',
    ).value;
    if (process.env.NODE_ENV !== 'production') {
      result['debug'] = 1;
      result['debugEmail'] = 'test@hyeon.pro';
    }
    delete result.location;
    Object.keys(result).map((key) => Form.set(key, result[key]));
    (async () => {
      try {
        if (document.querySelector('#dynamicForm')) {
          document.querySelector('#dynamicForm').remove();
        }
        const cForm = document.createElement('form');
        cForm.setAttribute('charset', 'UTF-8');
        cForm.setAttribute('method', 'Post'); //Post 방식
        cForm.setAttribute('style', 'display: none !important'); //Post 방식
        cForm.setAttribute('id', 'dynamicForm');
        cForm.setAttribute(
          'action',
          'https://webto.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8',
        );
        Object.keys(result).map((key) => {
          const input = document.createElement('input');
          input.setAttribute('value', result[key]);
          if (key === 'submit') {
            input.setAttribute('type', key);
          } else {
            input.setAttribute('name', key);
          }
          cForm.appendChild(input);
          return '';
        });
        document.body.appendChild(cForm);
        cForm.submit();

        setSuccess(true);
      } catch (e) {
        setFail(e.message);
      }
    })();
  };

  return (
    <GridThemeProvider gridTheme={Grid}>
      <>
        <form className="policyForm" onSubmit={handleSubmit(onSubmit)}>
          <RPN>
            <Row>
              <Col col>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span className="required">
                        <FaStar />
                      </span>
                      <span>접수 처리 유형</span>
                    </div>
                  </div>
                </Label>
                <Controller
                  as={
                    <FormControl>
                      <RadioGroup defaultValue="지원실 자체접수">
                        <div className="deliveryList">
                          <FormControlLabel
                            value="지원실 자체접수"
                            control={<Radio />}
                            label="지원실 자체접수"
                          />
                          <FormControlLabel
                            value="창고출고"
                            control={<Radio />}
                            label="창고출고"
                          />
                          <FormControlLabel
                            value="반품처리"
                            control={<Radio />}
                            label="반품처리"
                          />
                          <FormControlLabel
                            value="AM 활동"
                            control={<Radio />}
                            label="AM 활동"
                          />
                        </div>
                      </RadioGroup>
                    </FormControl>
                  }
                  name="00N9000000EK7XL"
                  defaultValue="접수 처리 유형"
                  control={control}
                />
              </Col>
            </Row>
            <Row>
              <Col col={12} sm={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span>상호 (계산서 승인처)</span>
                    </div>
                  </div>
                  <Input
                    name="company"
                    ref={register()}
                    placeholder="상호명을 입력하세요."
                    className={errors['company'] && 'validateFailed'}
                  />
                </Label>
              </Col>
              <Col col={12} sm={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span>현장명</span>
                    </div>
                  </div>
                  <Input
                    name="00N9000000Do9fV"
                    ref={register()}
                    placeholder="이름을 입력하세요"
                    className={errors['00N9000000Do9fV'] && 'validateFailed'}
                  />
                </Label>
              </Col>
            </Row>
            <Row>
              <Col col={12} xl={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span>성명</span>
                    </div>
                  </div>
                  <Input
                    name="name"
                    ref={register()}
                    placeholder="이름을 입력하세요"
                    className={errors['name'] && 'validateFailed'}
                  />
                </Label>
              </Col>
              <Col col={12} xl={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span className="required">
                        <FaStar />
                      </span>
                      <span>지역</span>
                    </div>
                  </div>
                </Label>
                <Input.Postcode
                  name="우편번호"
                  placeholder="우편번호"
                  value={values.address.zonecode}
                  className={errors['우편번호'] && 'validateFailed'}
                  readOnly
                />
                <Input.Address
                  name="location"
                  placeholder="주소"
                  ref={register({
                    required: true,
                  })}
                  value={values.address.fullAddress}
                  className={errors['location'] && 'validateFailed'}
                  readOnly
                />
                <Btn onClick={toggleModal} variant="contained">
                  우편번호/주소 검색
                </Btn>
                <StyledModal
                  isOpen={values.addressModalOpen}
                  onBackgroundClick={toggleModal}
                >
                  <Postcode completeAfter={completePostCode} />
                </StyledModal>
              </Col>
            </Row>
            <Row>
              <Col col={12} sm={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span className="required">
                        <FaStar />
                      </span>
                      <span>휴대폰</span>
                    </div>
                  </div>
                  <Input
                    name="phone"
                    ref={register({
                      required: true,
                      pattern: {
                        value: /^\d{3}\d{3,4}\d{4}$/,
                        message: '잘못된 형식의 휴대폰 번호',
                      },
                    })}
                    placeholder="010-1234-5678"
                    className={errors['phone'] && 'validateFailed'}
                  />
                </Label>
                <ErrorMessage>
                  {errors['phone'] && errors['phone'].message}
                </ErrorMessage>
              </Col>
              <Col col={12} sm={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span className="required">
                        <FaStar />
                      </span>
                      <span>이메일</span>
                    </div>
                  </div>
                  <Input
                    name="email"
                    ref={register({
                      required: true,
                      pattern: {
                        value: /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i,
                        message: '잘못된 형식의 이메일 주소',
                      },
                    })}
                    placeholder="user@email.com"
                    className={errors['email'] && 'validateFailed'}
                  />
                </Label>
                <ErrorMessage>
                  {errors['email'] && errors['email'].message}
                </ErrorMessage>
              </Col>
            </Row>
            <Row>
              <Col col={12}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span className="required">
                        <FaStar />
                      </span>
                      <span>장비명</span>
                    </div>
                  </div>
                  <Autocomplete
                    options={equipmentOptions}
                    className="border"
                    getOptionLabel={(option) => option.title}
                    renderInput={(params) => (
                      <TextField
                        {...params}
                        variant="outlined"
                        required
                        ref={product}
                        name="00N9000000Do9fp"
                      />
                    )}
                  />
                </Label>
                <ErrorMessage>
                  {errors['00N9000000Do9fp'] &&
                    errors['00N9000000Do9fp'].message}
                </ErrorMessage>
              </Col>
            </Row>
            <Row>
              <Col col>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span>요청 사항</span>
                    </div>
                  </div>
                  <TextareaAutosize
                    label="기타"
                    className="etcField"
                    rowsMin={8}
                    onChange={(e) =>
                      setValues({ ...values, etcValue: e.target.value })
                    }
                    placeholder="요청사항을 입력하세요."
                  />
                  <input
                    name="description"
                    ref={register()}
                    value={values.etcValue}
                    readOnly
                    hidden
                  />
                </Label>
              </Col>
            </Row>
            <Row>
              <Col style={{ borderBottom: '0' }} col>
                <PrivacyPolicy />
              </Col>
            </Row>
            <BtnWrap>
              <Btn type="submit" variant="contained">
                문의 등록하기
              </Btn>
            </BtnWrap>
          </RPN>

          <SuccessModal
            isOpen={success}
            onBackgroundClick={() => setSuccess(false)}
          >
            <h1>등록이 완료되었습니다.</h1>
            <p>최대 1시간 이내에 응답하겠습니다. 감사합니다.</p>
            <button type="button" onClick={() => setSuccess(false)}>
              확인
            </button>
          </SuccessModal>
          <FailModal
            isOpen={typeof fail !== 'boolean'}
            onBackgroundClick={() => setFail(false)}
          >
            <h1>등록이 실패하였습니다.</h1>
            <p>{fail}</p>
            <button type="button" onClick={() => setFail(false)}>
              확인
            </button>
          </FailModal>

          {process.env.NODE_ENV !== 'production' && (
            <>
              <div>
                <h2>Return Data</h2>
                {values.data && (
                  <pre>{JSON.stringify(values.data, null, 2)}</pre>
                )}
              </div>
            </>
          )}
        </form>
      </>
    </GridThemeProvider>
  );
}

export default App;
