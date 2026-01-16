document.addEventListener(
  'click',
  function (e) {
    // NAV
    if (e.target.closest('.btn-loadmore')) {
      if (document.getElementById('moreprogram')) {
        btn = document.getElementById('btn-loadmore');
        if (btn.textContent == 'ดูทั้งหมด') {
          document.getElementById('moreprogram').classList.add('active-more');
          btn.innerHTML =
            '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 9C1.5 13.1355 4.86453 16.5 9 16.5C13.1355 16.5 16.5 13.1355 16.5 9C16.5 4.86453 13.1355 1.5 9 1.5C4.86453 1.5 1.5 4.86453 1.5 9ZM2.625 9C2.625 5.47252 5.47252 2.625 9 2.625C12.5275 2.625 15.375 5.47252 15.375 9C15.375 12.5275 12.5275 15.375 9 15.375C5.47252 15.375 2.625 12.5275 2.625 9ZM6.18164 8.44336C6.18167 8.55531 6.21509 8.6647 6.27764 8.75754C6.34019 8.85038 6.42901 8.92245 6.53275 8.96453C6.63649 9.00661 6.75042 9.01678 6.85997 8.99374C6.96952 8.9707 7.0697 8.9155 7.1477 8.83521L8.4375 7.54541L8.4375 11.8125C8.43644 11.887 8.45022 11.961 8.47801 12.0302C8.50581 12.0994 8.54707 12.1623 8.59941 12.2154C8.65175 12.2685 8.71411 12.3107 8.78288 12.3394C8.85165 12.3682 8.92545 12.383 9 12.383C9.07454 12.383 9.14835 12.3682 9.21712 12.3394C9.28589 12.3107 9.34825 12.2685 9.40059 12.2154C9.45293 12.1623 9.49419 12.0994 9.52199 12.0302C9.54978 11.961 9.56355 11.887 9.5625 11.8125L9.5625 7.54541L10.8523 8.83521C10.9041 8.88919 10.9662 8.93229 11.0349 8.96198C11.1036 8.99167 11.1775 9.00736 11.2524 9.00812C11.3272 9.00888 11.4014 8.9947 11.4707 8.96641C11.54 8.93812 11.603 8.89629 11.6559 8.84338C11.7088 8.79046 11.7506 8.72751 11.7789 8.65822C11.8072 8.58894 11.8214 8.5147 11.8206 8.43987C11.8199 8.36504 11.8042 8.2911 11.7745 8.22241C11.7448 8.15371 11.7017 8.09163 11.6477 8.0398L9.3977 5.7898C9.29221 5.68435 9.14916 5.62511 9 5.62511C8.85084 5.62511 8.70779 5.68435 8.60229 5.7898L6.35229 8.0398C6.2983 8.09223 6.25537 8.15496 6.22606 8.22428C6.19675 8.2936 6.18164 8.3681 6.18164 8.44336Z" fill="#2D2A4A" /></svg>ดูน้อยลง';
          document.getElementById('s-program').classList.add('showall');
        } else {
          document.getElementById('moreprogram').classList.remove('active-more');
          document.getElementById('s-program').classList.remove('showall');
          btn.innerHTML =
            '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 8C15.5 3.86452 12.1355 0.5 8 0.5C3.86453 0.499999 0.500002 3.86452 0.500002 8C0.500001 12.1355 3.86453 15.5 8 15.5C12.1355 15.5 15.5 12.1355 15.5 8ZM14.375 8C14.375 11.5275 11.5275 14.375 8 14.375C4.47252 14.375 1.625 11.5275 1.625 8C1.625 4.47252 4.47252 1.625 8 1.625C11.5275 1.625 14.375 4.47252 14.375 8ZM10.8184 8.55664C10.8183 8.44469 10.7849 8.3353 10.7224 8.24246C10.6598 8.14962 10.571 8.07755 10.4673 8.03547C10.3635 7.99339 10.2496 7.98322 10.14 8.00626C10.0305 8.0293 9.9303 8.0845 9.8523 8.16479L8.5625 9.45459L8.5625 5.1875C8.56356 5.11296 8.54978 5.03896 8.52199 4.96979C8.49419 4.90062 8.45293 4.83766 8.40059 4.78458C8.34825 4.7315 8.28589 4.68934 8.21712 4.66057C8.14835 4.6318 8.07455 4.61699 8 4.61699C7.92546 4.61699 7.85165 4.6318 7.78288 4.66057C7.71411 4.68934 7.65175 4.7315 7.59941 4.78458C7.54707 4.83766 7.50581 4.90062 7.47801 4.96979C7.45022 5.03896 7.43645 5.11296 7.4375 5.1875L7.4375 9.45459L6.14771 8.16479C6.09587 8.11081 6.03379 8.06771 5.9651 8.03802C5.8964 8.00833 5.82247 7.99264 5.74763 7.99188C5.6728 7.99112 5.59856 8.0053 5.52928 8.03359C5.45999 8.06188 5.39705 8.1037 5.34413 8.15662C5.29121 8.20954 5.24938 8.27249 5.22109 8.34177C5.1928 8.41106 5.17863 8.4853 5.17939 8.56013C5.18015 8.63496 5.19583 8.7089 5.22552 8.77759C5.25521 8.84629 5.29831 8.90837 5.3523 8.9602L7.6023 11.2102C7.70779 11.3157 7.85084 11.3749 8 11.3749C8.14916 11.3749 8.29221 11.3157 8.39771 11.2102L10.6477 8.9602C10.7017 8.90777 10.7446 8.84504 10.7739 8.77572C10.8033 8.7064 10.8184 8.6319 10.8184 8.55664Z" fill="#2D2A4A" /></svg >ดูทั้งหมด';
        }
      }
    }
    if (e.target.closest('.footer-section-list .gb-headline')) {
      if (e.target.closest('.footer-section-list').classList.contains('active')) {
        e.target.closest('.footer-section-list').classList.remove('active');
      } else {
        e.target.closest('.footer-section-list').classList.add('active');
      }
    }

    if (e.target.closest('.expand-button.not-active')) {
      document.querySelector('#major-list').classList.remove('expand');
      e.target.classList.remove('not-active');
      e.target.classList.add('active');

      e.target.innerHTML = e.target.innerHTML.replace('ข้อมูลทั้งหมด', 'แสดงน้อยลง');
    } else if (e.target.closest('.expand-button.active')) {
      document.querySelector('#major-list').classList.add('expand');
      e.target.classList.add('not-active');
      e.target.classList.remove('active');
      e.target.innerHTML = e.target.innerHTML.replace('แสดงน้อยลง', 'ข้อมูลทั้งหมด');
    }

    if (e.target.closest('.s_showmore')) {
      if (document.querySelector('.s_more.active')) {
        document.querySelectorAll('.s_more').forEach((content) => {
          content.classList.remove('active');
        });
        e.target.innerHTML = e.target.innerHTML.replace('แสดงน้อยลง', 'ดูทั้งหมด');
        document.querySelector('.s_showmore svg').style.transform = 'rotate(0deg)';
      } else {
        document.querySelectorAll('.s_more').forEach((content) => {
          content.classList.add('active');
        });
        e.target.innerHTML = e.target.innerHTML.replace('ดูทั้งหมด', 'แสดงน้อยลง');
        document.querySelector('.s_showmore svg').style.transform = 'rotate(180deg)';
      }
    }
  },
  false
);

const searchprogram = document.querySelector('.search-text');
const selectname = document.querySelector('.search-school');
const selectterm = document.querySelector('.term');
const parentDivs = document.querySelectorAll('.program-details');


// ซ้อนอันที่ไม่มีข้อมูล
function hideheaderdegree() {
  const parents = document.querySelectorAll('.degree');
  parents.forEach((parent) => {
    const children = parent.querySelectorAll('.program-details');
    let allChildrenDisplayNone = true;
    for (let i = 0; i < children.length; i++) {
      if (children[i].style.display !== 'none') {
        allChildrenDisplayNone = false;
        break;
      }
    }
    if (allChildrenDisplayNone) {
      parent.style.display = 'none';
    }
  });
}

if (document.querySelector('.s-program')) {
  hideheaderdegree();
}

function showallprogram() {
  document.querySelectorAll('.more').forEach((content) => {
    content.classList.add('active-more');
  });
  document.querySelectorAll('.degree').forEach((content) => {
    content.style.display = 'block';
  });
  document.querySelectorAll('.program-details ').forEach((content) => {
    content.style.display = '';
  });
  document.getElementById('s-program').classList.add('showall');

  if (document.getElementById('btn-loadmore')) {
    document.getElementById('btn-loadmore').style.display = 'block';
    document.getElementById('btn-loadmore').innerHTML =
      '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 9C1.5 13.1355 4.86453 16.5 9 16.5C13.1355 16.5 16.5 13.1355 16.5 9C16.5 4.86453 13.1355 1.5 9 1.5C4.86453 1.5 1.5 4.86453 1.5 9ZM2.625 9C2.625 5.47252 5.47252 2.625 9 2.625C12.5275 2.625 15.375 5.47252 15.375 9C15.375 12.5275 12.5275 15.375 9 15.375C5.47252 15.375 2.625 12.5275 2.625 9ZM6.18164 8.44336C6.18167 8.55531 6.21509 8.6647 6.27764 8.75754C6.34019 8.85038 6.42901 8.92245 6.53275 8.96453C6.63649 9.00661 6.75042 9.01678 6.85997 8.99374C6.96952 8.9707 7.0697 8.9155 7.1477 8.83521L8.4375 7.54541L8.4375 11.8125C8.43644 11.887 8.45022 11.961 8.47801 12.0302C8.50581 12.0994 8.54707 12.1623 8.59941 12.2154C8.65175 12.2685 8.71411 12.3107 8.78288 12.3394C8.85165 12.3682 8.92545 12.383 9 12.383C9.07454 12.383 9.14835 12.3682 9.21712 12.3394C9.28589 12.3107 9.34825 12.2685 9.40059 12.2154C9.45293 12.1623 9.49419 12.0994 9.52199 12.0302C9.54978 11.961 9.56355 11.887 9.5625 11.8125L9.5625 7.54541L10.8523 8.83521C10.9041 8.88919 10.9662 8.93229 11.0349 8.96198C11.1036 8.99167 11.1775 9.00736 11.2524 9.00812C11.3272 9.00888 11.4014 8.9947 11.4707 8.96641C11.54 8.93812 11.603 8.89629 11.6559 8.84338C11.7088 8.79046 11.7506 8.72751 11.7789 8.65822C11.8072 8.58894 11.8214 8.5147 11.8206 8.43987C11.8199 8.36504 11.8042 8.2911 11.7745 8.22241C11.7448 8.15371 11.7017 8.09163 11.6477 8.0398L9.3977 5.7898C9.29221 5.68435 9.14916 5.62511 9 5.62511C8.85084 5.62511 8.70779 5.68435 8.60229 5.7898L6.35229 8.0398C6.2983 8.09223 6.25537 8.15496 6.22606 8.22428C6.19675 8.2936 6.18164 8.3681 6.18164 8.44336Z" fill="#2D2A4A" /></svg>ดูน้อยลง';
  }
}

function selecrtsearch(event, event2) {
  showallprogram();

  if (document.getElementById('btn-loadmore')) {
  document.getElementById('btn-loadmore').style.display = 'none';
  }
  const selectedOption = event.options[event.selectedIndex];
  const selectedValue = selectedOption.value;
  const selectedDataset = selectedOption.dataset.serach;

  if (event2 != '') {
    const selectedOption2 = event2.options[event2.selectedIndex];
    var selectedValue2 = selectedOption2.value;
    var selectedDataset2 = selectedOption2.dataset.serach;
  } else {
    var selectedValue2 = 'all';
    var selectedDataset2 = '';
  }
  if (selectedValue !== 'all' || selectedValue2 !== 'all') {
    parentDivs.forEach(function (parentDiv) {
      const childElements = parentDiv.querySelectorAll('.data');
      childElements.forEach(function (content) {

        if ((selectedValue == 'all' && selectedValue2 !== '')) {
          var conditions = content.dataset[selectedDataset2] === selectedValue2;
        } else if (event2 != '' && selectedValue2 !== 'all') {
          var conditions = content.dataset[selectedDataset] === selectedValue && content.dataset[selectedDataset2] === selectedValue2;
        } else {
          var conditions = content.dataset[selectedDataset] === selectedValue;
        }

        if (conditions) {
          parentDiv.style.display = 'block';
        } else {
          parentDiv.style.display = 'none';
        }
      });
    });
  } else {
    showallprogram();
  }
  hideheaderdegree();
}

function searchall(event) {
  showallprogram();

  const selectedValue = event.value;
  parentDivs.forEach(function (parentDiv) {
    const childElements = parentDiv.querySelectorAll('.data');
    childElements.forEach(function (content) {
      let isMatch = false;
      for (let key in content.dataset) {
        if (content.dataset[key].toLowerCase().search(selectedValue.toLowerCase()) >= 0) {
          isMatch = true;
          break;
        }
      }
      if (isMatch) {
        parentDiv.style.display = 'block';
      } else {
        parentDiv.style.display = 'none';
      }
    });
  });

  hideheaderdegree();
}

if (selectterm) {
  selectterm.addEventListener('change', (event) => {
    searchprogram.value = '';
    if (selectname && selectname.value !== '') {
      selecrtsearch((event = selectname), (event2 = selectterm));
    } else {
      selecrtsearch((event = selectterm), (event2 = ''));
    }
  });
}

if (selectname) {
  selectname.addEventListener('change', (event) => {
    searchprogram.value = '';
    selectterm.value = '';
    selecrtsearch((event = selectname), (event2 = ''));
  });
}

if (searchprogram) {
  searchprogram.addEventListener('keyup', (event) => {
    if (selectname) {
      selectname.value = '';
    }

    selectterm.value = '';
    searchall((event = searchprogram));
  });
}

// zipcode
document.addEventListener('keyup', function (e) {
  if (e.target.closest('#input_1_15')) {
    var postcode = e.target.value;
    var addresslink = 'https://devx.nida.ac.th/wp-content/themes/nida/assets/postcode-th.json';

    fetch(addresslink)
      .then((response) => response.json())
      .then((json) => addressLoopJson(postcode, json));
  }
});

document.addEventListener('click', function (e) {
  if (e.target.closest('.contact-addaddress')) {
    e.preventDefault();

    var thisHtml = e.target.innerHTML;
    var addressField = document.querySelector('#input_1_16');
    var addressArea = document.querySelector('.address-list');

    addressField.value = thisHtml;
    addressArea.style.display = 'none';
  }

  if (e.target.closest('.program-name')) {
    e.preventDefault();

    var thisHtml = e.target.innerHTML;
    var programField = document.querySelector('#input_1_36');
    var programArea = document.querySelector('.program-list');
    var programID = document.querySelector('#input_1_35');

    programID.value = e.target.dataset.pid;
    programField.value = thisHtml;
    programArea.style.display = 'none';
  }
});

function addressLoopJson(code, data) {
  var items = [];

  data.forEach(function (e) {
    if (code == e.zipCode) {
      var province = e.provinceList,
        district = e.districtList,
        subDistrict = e.subDistrictList,
        provinceItem = [],
        districtItem = [];

      province.forEach(function (e) {
        provinceItem[e.provinceId] = e.provinceName;
      });

      district.forEach(function (e) {
        districtItem[e.districtId] = e.districtName;
      });

      subDistrict.forEach(function (e) {
        var item = '<div class="address-item"><a href="#" class="contact-addaddress" data-district="' + e.subDistrictName + '" data-city="' + districtItem[e.districtId] + '" data-state="' + provinceItem[e.provinceId] + '" data-postcode="' + code + '">' + e.subDistrictName + ', ' + districtItem[e.districtId] + ', ' + provinceItem[e.provinceId] + ' ' + code + '</a></div>';
        items.push(item);
      });
    }
  });

  var addressArea = document.querySelector('.address-list');
  if (items.length > 0) {
    fadeIn(addressArea, 300);
    addressArea.innerHTML = '';
    items.forEach(function (item) {
      addressArea.innerHTML += item;
    });
  } else {
    addressArea.innerHTML = 'ไม่พบรหัสไปรษณีย์';
  }
}

// Animation fade in.
function fadeIn(el, time) {
  el.style.display = 'block';
  el.style.opacity = 0;
  var last = +new Date();
  var tick = function () {
    el.style.opacity = +el.style.opacity + (new Date() - last) / time;
    last = +new Date();

    if (+el.style.opacity < 1) {
      (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
    }
  };
  tick();
}

window.onload = setTimeout(function () {
  const contactAddress = document.querySelector('#field_1_16');
  if (contactAddress != null) {
    let addressList = document.createElement('div');
    addressList.classList.add('address-list');
    contactAddress.appendChild(addressList);
  }

  const program = document.querySelector('#field_1_36');
  if (program != null) {
    let programlist = document.createElement('div');
    programlist.classList.add('program-list');
    program.appendChild(programlist);

    const urlParams = new URLSearchParams(location.search);
    const progid = urlParams.get('progid');
    if (progid != null) {
      var formData = new FormData();
      var ajaxRequest = new XMLHttpRequest();

      formData.append('action', 'get_program_title');
      formData.append('program_id', progid);

      ajaxRequest.open('POST', '/wp-admin/admin-ajax.php', true);
      ajaxRequest.onload = function () {
        if (this.status >= 200 && this.status < 400) {
          var program = document.querySelector('#input_1_36');
          program.value = this.response;
        } else {
          alert('error ' + this.status);
        }
      };
      ajaxRequest.send(formData);
    }
  }
}, 1000);

document.addEventListener('change', function (e) {
  if (e.target.closest('#input_1_2')) {
    var school = e.target.value;
    if (school != '') {
      var formData = new FormData();
      formData.append('action', 'get_program_by_school');
      formData.append('school_id', school);
      var ajaxRequest = new XMLHttpRequest();
      ajaxRequest.open('POST', '/wp-admin/admin-ajax.php', true);
      ajaxRequest.onload = function () {
        if (this.status >= 200 && this.status < 400) {
          var program = document.querySelector('.program-list');
          fadeIn(program, 300);
          program.innerHTML = this.response;
        } else {
          alert('error ' + this.status);
        }
      };
      ajaxRequest.send(formData);
    }
  }
});

//Check Height major-list and add class for content more
if (document.body.classList.contains('single-master') || document.body.classList.contains('single-phd') || document.body.classList.contains('single-course') || document.body.classList.contains('single-double-degree')) {
  const height = document.querySelector('#major-list').offsetHeight;
  if (height >= 420) {
    let major_list = document.querySelector('#major-list');
    major_list.classList.add('expand');

    let button = document.createElement('p');
    button.innerHTML =
      '<span class="expand-button _h not-active">ข้อมูลทั้งหมด <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 10C20 4.48603 15.514 -1.96091e-07 10 -4.37114e-07C4.48604 -6.78137e-07 1.71126e-06 4.48603 1.47023e-06 10C1.22921e-06 15.514 4.48604 20 10 20C15.514 20 20 15.514 20 10ZM18.5 10C18.5 14.7033 14.7033 18.5 10 18.5C5.2967 18.5 1.5 14.7033 1.5 10C1.5 5.29669 5.2967 1.5 10 1.5C14.7033 1.5 18.5 5.29669 18.5 10ZM13.7578 10.7422C13.7578 10.5929 13.7132 10.4471 13.6298 10.3233C13.5464 10.1995 13.428 10.1034 13.2897 10.0473C13.1514 9.99119 12.9994 9.97763 12.8534 10.0083C12.7073 10.0391 12.5737 10.1127 12.4697 10.2197L10.75 11.9395L10.75 6.25C10.7514 6.15061 10.733 6.05194 10.696 5.95972C10.6589 5.86749 10.6039 5.78355 10.5341 5.71277C10.4643 5.642 10.3812 5.58579 10.2895 5.54743C10.1978 5.50907 10.0994 5.48932 10 5.48932C9.90061 5.48932 9.8022 5.50907 9.71051 5.54743C9.61882 5.58579 9.53566 5.64199 9.46588 5.71277C9.3961 5.78355 9.34108 5.86749 9.30402 5.95972C9.26696 6.05194 9.2486 6.15061 9.25 6.25L9.25 11.9395L7.53027 10.2197C7.46116 10.1477 7.37839 10.0903 7.28679 10.0507C7.1952 10.0111 7.09662 9.99019 6.99684 9.98918C6.89706 9.98816 6.79808 10.0071 6.7057 10.0448C6.61332 10.0825 6.52939 10.1383 6.45884 10.2088C6.38828 10.2794 6.33251 10.3633 6.29479 10.4557C6.25707 10.5481 6.23817 10.6471 6.23918 10.7468C6.2402 10.8466 6.26111 10.9452 6.3007 11.0368C6.34028 11.1284 6.39775 11.2112 6.46973 11.2803L9.46973 14.2803C9.61038 14.4209 9.80112 14.4999 10 14.4999C10.1989 14.4999 10.3896 14.4209 10.5303 14.2803L13.5303 11.2803C13.6023 11.2104 13.6595 11.1267 13.6986 11.0343C13.7377 10.9419 13.7578 10.8425 13.7578 10.7422Z" fill="#00704A"/></svg></span>';

    major_list.append(button);
  }
}
