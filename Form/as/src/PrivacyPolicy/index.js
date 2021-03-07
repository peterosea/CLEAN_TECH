import React from 'react';
import { Checkbox, FormControlLabel } from '@material-ui/core';
import { FaStar } from 'react-icons/fa';
// components
import { PPC, Label } from '../AppStyle';

const PrivacyPolicy = () => {
  return (
    <section>
      <PPC>
        <Label>
          <div className="nameWrap">
            <div className="name">
              <span className="required">
                <FaStar />
              </span>
              <span>개인정보 활용 동의</span>
            </div>
          </div>
        </Label>
        <div className="tableWrap">
          주) 크린텍은 장비구입 신청 및 상담 등을 위해 아래와 같이 수집을 하고
          있습니다
          <br />
          <br />
          <strong>수집하는 개인정보의 항목</strong>
          <br />
          - 필수항목 : 회사 상호명, 현장명, 이름, 이메일, 지역, 장비명
          <br />
          - 선택항목 : 휴대폰 번호
          <br />
          개인정보의 수집 및 이용 목적
          <br />
          - 장비구입 신청 및 상담관련 제반 업무
          <br />
          - 당사 고객 만족도 조사, 전시회, 고객초청행사, 신규장비 안내 등과 같은
          설문, DM용
          <br />
          <br />
          개인정보 보유 및 이용 기간
          <br />
          <br />
          - 본인이 동의를 철회할 때까지 유효
          <br />
          <br />
          - 고객의 동의 철회 요청시 해당 개인정보는 지체 없이 파기 (동의 철회
          요청 1544-3050)
          <br />
          <br />
          동의 거부권 및 미동의에 대한 불이익 안내
          <br />
          <br />
          - 고객님께서는 개인정보 수집 및 이용에 동의하지 않으실 수 있습니다.
          <br />
          <br />
          - 단 필수정보 미입력시 장비구입 신청 및 상담에 제약이 있을 수
          있습니다.
          <br />
          <br />
          위와 같이 개인정보를 수집∙이용하는데 동의하십니까?
        </div>
        <FormControlLabel
          control={<Checkbox required />}
          label="개인정보 활용에 동의합니다."
        />
      </PPC>
    </section>
  );
};

export default PrivacyPolicy;
