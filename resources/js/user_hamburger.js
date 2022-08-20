function hamOpen(ham,res_nav){
    if(ham!=null&&res_nav!=null){
        ham.addEventListener('click',function(){
            res_nav.classList.toggle('hidden');
        })
    }
}

if(document.querySelector('#user_hamburger')==null){
    //ユーザー側のハンバーガーメニュー
    const company_ham=document.querySelector('#company_hamburger');
    const company_res_nav=document.querySelector('#company_res_nav');
    hamOpen(company_ham,company_res_nav);
}
else if(document.querySelector('#user_hamburger')!=null){
    //企業側のハンバーガーメニュー
    const user_ham=document.querySelector('#user_hamburger');
    const user_res_nav=document.querySelector('#user_res_nav');
    hamOpen(user_ham,user_res_nav);
}
else{
}
// else if(document.querySelector('#company_hamburger')!=null){
//     //企業側のハンバーガーメニュー
//     const user_ham=document.querySelector('#user_hamburger');
//     const user_res_nav=document.querySelector('#user_res_nav');
//     hamOpen(user_ham,user_res_nav);
// }





