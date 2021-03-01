import DaumPostcode from 'react-daum-postcode';

const Postcode = (props) => {
  const handleComplete = (data) => {
    let fullAddress = data.address;
    let extraAddress = '';

    if (data.addressType === 'R') {
      if (data.bname !== '') {
        extraAddress += data.bname;
      }
      if (data.buildingName !== '') {
        extraAddress +=
          extraAddress !== '' ? `, ${data.buildingName}` : data.buildingName;
      }
      fullAddress += extraAddress !== '' ? ` (${extraAddress})` : '';
    }

    props.completeAfter({ fullAddress, zonecode: data.zonecode });
  };

  return <DaumPostcode onComplete={handleComplete} />;
};

export default Postcode;
