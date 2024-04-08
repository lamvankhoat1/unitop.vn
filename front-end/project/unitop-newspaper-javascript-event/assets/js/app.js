function getElement(css) {
    return document.querySelector(css);
}

let data_mainMenu = [
    "Trang chủ",
    "Thời trang",
    "Đời sống",
    "Xã hội",
    "Bóng đá",
    "Video",
    "Sự kiện",
    "Liên hệ",
    "Tin tức",
    "Giải trí"
]

let data_topics = [
    {topic: "Thời trang ", number: "20"},
    {topic: "Đời sống ", number: "30"},
    {topic: "Xã hội ", number: "26"},
    {topic: "Bóng đá ", number: "35"},
    {topic: "Điện ảnh ", number: "29"},
    {topic: "Sự kiện ", number: "15"},
    {topic: "Du lịch ", number: "34"},
    {topic: "Nội trợ ", number: "45"},
]

let data_hightLight = [
    {
        img: "assets/images/highlight-1.png", 
        text: "Xu hướng thời trang hè 2020: Những mảnh ghép đáng được chú ý", 
        url: "#"
    },
    {
        img: "assets/images/highlight-2.png", 
        text: "BUỔI TRÌNH DIỄN THỜI TRANG MÙA XUÂN TẠI ĐẠI HỌC MICHIGAN ĐÃ BẮT ĐẦU", 
        url: "#"
    },
    {
        img: "assets/images/highlight-3.png", 
        text: "BẬT MÍ CÁCH MẶC ĐẸP CHO NGƯỜI MẬP TRỞ NÊN THON GỌN", 
        url: "#"
    }
]

let data_newPost = [
    {
        img: "assets/images/article-1.png",
        title: "Bạn có phải là một người phụ nữ có phong cách?",
        author: "phancuong",
        public: "10/08/2020",
        url: "",
        descrition: `Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
        ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
        lacus vel facilisis. `
    },
    {
        img: "assets/images/article-2.png",
        title: "Cách để bạn ltuôn tỏa sáng trước đám đông",
        author: "phancuong",
        public: "10/08/2020",
        url: "",
        descrition: `Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
        ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
        lacus vel facilisis. `
    },
    {
        img: "assets/images/article-3.png",
        title: "Những kiểu tóc mới là xu hướng của giới trẻ 2020",
        author: "phancuong",
        public: "10/08/2020",
        url: "",
        descrition: `Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
        ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
        lacus vel facilisis. `
    },
    {
        img: "assets/images/article-4.png",
        title: "15 địa điểm du lịch nổi tiếng bạn cần đến tại Việt Nam",
        author: "phancuong",
        public: "10/08/2020",
        url: "",
        descrition: `Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
        ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
        lacus vel facilisis. `
    },
    {
        img: "assets/images/article-5.png",
        title: "Hãy xách balo lên và đi và trải nghiệm những khoảnh khắc thú vị",
        author: "phancuong",
        public: "10/08/2020",
        url: "",
        descrition: `Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
        ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
        lacus vel facilisis. `
    },
    {
        img: "assets/images/article-6.png",
        title: "Top 10 nữ hoàng DJ nỗi tiếng nhất Las Vegas bạn cần biết",
        author: "phancuong",
        public: "10/08/2020",
        url: "",
        descrition: `Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
        ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
        lacus vel facilisis. `
    },
    {
        img: "assets/images/article-1.png",
        title: "Bạn có phải là một người phụ nữ có phong cách?",
        author: "phancuong",
        public: "10/08/2020",
        url: "",
        descrition: `Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
        ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
        lacus vel facilisis. `
    }
]

for (let category of data_mainMenu) {
    getElement("#main-menu").innerHTML += `<li><a href="#">${category}</a></li>`
}

for(let item of data_hightLight){
    getElement(".box#hightlight .box-body").innerHTML+= `<div class="post">
    <a href="${item.url}" class="thumb"><img src="${item.img}" alt=""></a>
    <a href="${item.url}" class="text-uppercase text-title">${item.text}</a>
</div>`
}

for(let item of data_newPost){
    getElement("#news-post .box-body").innerHTML+= `<div class="post d-flex">
    <a href="${item.url}" class="thumb"><img src="${item.img}" alt="${item.title}"></a>
    <div class="post-detail">
        <div class="post-heading" title="${item.title}">${item.title}</div>
        <div class="div d-flex mt mb" style="--mt: 16px; --mb: 15px">
            <div class="post-author">${item.author}</div>
            <div class="post-public">${item.public}</div>
        </div>
        <p class="short-description">${item.descrition}</p>
    </div>
</div>`
}

for(let item of data_topics){
    getElement("#topics-of-interest .box-body ul").innerHTML+= `<li class="clearfix"><a href="#">${item.topic} <span
    class="num-post float-right">${item.number}</span></a></li>`
}