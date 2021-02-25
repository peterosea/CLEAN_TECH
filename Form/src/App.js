import { useState } from 'react';
import { useForm, Controller } from 'react-hook-form/dist/index.ie11';
import { GridThemeProvider, Row, Col } from 'styled-bootstrap-grid';
import { FaStar } from 'react-icons/fa';
import axios from 'axios';
import {
  RadioGroup,
  FormControlLabel,
  Radio,
  FormControl,
  TextareaAutosize,
} from '@material-ui/core';
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

function App() {
  const { handleSubmit, register, errors, control } = useForm({
    company: '',
    first_name: '',
  });
  const [values, setValues] = useState({
    data: undefined,
    addressModalOpen: false,
    address: false,
    etcValue: '',
  });
  const [success, setSuccess] = useState(false);
  const [fail, setFail] = useState(false);

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
    result['00N9000000DnxuJ'] = LocationFilter(result.location);
    delete result.location;
    Object.keys(result).map((key) => Form.set(key, result[key]));
    (async () => {
      try {
        const res = await axios({
          method: 'POST',
          url:
            'https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8',
          data: Form,
          headers: { 'Content-Type': 'multipart/form-data' },
        });
        console.log(res);
        setSuccess(true);
      } catch (e) {
        setFail(true);
      }
    })();
  };

  return (
    <GridThemeProvider gridTheme={Grid}>
      <>
        <form className="policyForm" onSubmit={handleSubmit(onSubmit)}>
          <RPN>
            <Row>
              <Col col={12} sm={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span>상호</span>
                    </div>
                  </div>
                  <Input
                    name="company"
                    ref={register()}
                    placeholder="상호명을 입력하세요."
                    className={errors['상호'] && 'validateFailed'}
                  />
                </Label>
              </Col>
              <Col col={12} sm={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span>성명</span>
                    </div>
                  </div>
                  <Input
                    name="first_name"
                    ref={register()}
                    placeholder="이름을 입력하세요"
                    className={errors['성명'] && 'validateFailed'}
                  />
                </Label>
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
                    name="mobile"
                    ref={register({
                      required: true,
                      pattern: {
                        value: /^\d{3}\d{3,4}\d{4}$/,
                        message: '잘못된 형식의 휴대폰 번호',
                      },
                    })}
                    placeholder="010-1234-5678"
                    className={errors['휴대폰'] && 'validateFailed'}
                  />
                </Label>
                <ErrorMessage>
                  {errors['휴대폰'] && errors['휴대폰'].message}
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
                    className={errors['이메일'] && 'validateFailed'}
                  />
                </Label>
                <ErrorMessage>
                  {errors['이메일'] && errors['이메일'].message}
                </ErrorMessage>
              </Col>
            </Row>
            <Row>
              <Col col={12} md={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span className="required">
                        <FaStar />
                      </span>
                      <span>방문 상담</span>
                    </div>
                  </div>
                </Label>
                <Controller
                  as={
                    <FormControl>
                      <RadioGroup defaultValue="방문수락">
                        <div className="deliveryList">
                          <FormControlLabel
                            value="방문수락"
                            control={<Radio />}
                            label="방문 상담을 받겠습니다."
                          />
                          <FormControlLabel
                            value="방문거절"
                            control={<Radio />}
                            label="전화 상담만 받겠습니다."
                          />
                        </div>
                      </RadioGroup>
                    </FormControl>
                  }
                  name="00N9000000FAfAk"
                  defaultValue="방문수락"
                  control={control}
                />
              </Col>
              <Col col={12} md={6}>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span className="required">
                        <FaStar />
                      </span>
                      <span>상담 장비</span>
                    </div>
                  </div>
                </Label>
                <Controller
                  as={
                    <FormControl>
                      <RadioGroup defaultValue="모델명 인지">
                        <div className="deliveryList">
                          <FormControlLabel
                            value="모델명 인지"
                            control={<Radio />}
                            label="모델명을 알고 있습니다."
                          />
                          <FormControlLabel
                            value="모델명 모름"
                            control={<Radio />}
                            label="모델명을 알지 못합니다."
                          />
                        </div>
                      </RadioGroup>
                    </FormControl>
                  }
                  name="00N9000000FAfAp"
                  defaultValue="모델명 인지"
                  control={control}
                />
              </Col>
            </Row>
            <Row>
              <Col col>
                <Label>
                  <div className="nameWrap">
                    <div className="name">
                      <span className="required">
                        <FaStar />
                      </span>
                      <span>구매 유형</span>
                    </div>
                  </div>
                </Label>
                <Controller
                  as={
                    <FormControl>
                      <RadioGroup defaultValue="구매">
                        <div className="deliveryList">
                          <FormControlLabel
                            value="구매"
                            control={<Radio />}
                            label="구매"
                          />
                          <FormControlLabel
                            value="임대"
                            control={<Radio />}
                            label="임대"
                          />
                          <FormControlLabel
                            value="구매+임대"
                            control={<Radio />}
                            label="구매 + 임대"
                          />
                        </div>
                      </RadioGroup>
                    </FormControl>
                  }
                  name="00N2v00000FTMq6"
                  defaultValue="구매"
                  control={control}
                />
              </Col>
            </Row>
            <Row>
              <Col col>
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
                  className={errors['주소'] && 'validateFailed'}
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
          <FailModal isOpen={fail} onBackgroundClick={() => setFail(false)}>
            <h1>등록이 실패하였습니다.</h1>
            <button type="button" onClick={() => setFail(false)}>
              확인
            </button>
          </FailModal>
          <input
            hidden
            ref={register()}
            name="lead_source"
            value="장비구입문의(홈페이지)"
          />
          <input hidden ref={register()} name="oid" value="00D90000000kgNF" />
          <input hidden ref={register()} name="retURL" value="http://" />
          <input hidden ref={register()} name="00N9000000DnxuT" value="1" />
          <input hidden ref={register()} name="submit" value="제출" />
          {process.env.NODE_ENV !== 'production' && (
            <>
              <input hidden ref={register()} name="debug" value="1" />
              <input
                hidden
                ref={register()}
                name="debugEmail"
                value="jeoh@cleantechco.co.kr"
              />
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
