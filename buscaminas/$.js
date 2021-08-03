function $(argument){class obj{constructor(e){this.element=e,this.this=this.element}html(e){if(this.element.length>1)for(var t=0;t<this.element.length;t++)this.element[t].this.innerHTML=(e);else this.element.innerHTML=(e);}event(e,f){if(this.element.length>1)for(var t=0;t<this.element.length;t++)this.element[t].this.addEventListener(e,f);else this.element.addEventListener(e,f)}val(e){return e?this.element.value=e:this.element.value}src(e){return e?this.element.src=e:this.element.src}attr(e,i){if(this.element.length>1)for(var t=0;t<this.element.length;t++)this.element[t].setAttribute(e,i);else this.element.setAttribute(e,i)}append(e){if(this.element.length>1)for(var t=0;t<this.element.length;t++)this.element[t].this.innerHTML+=e;else this.element.innerHTML+=e}css(obj){if(this.element.length>1)for(var i=0;i<this.element.length;i++)for(let p in obj)eval("this.element["+i+"].this.style."+p+"='"+obj[p]+"'");else for(let p in obj)eval("this.element.style."+p+"='"+obj[p]+"'")}toggleClass(e){if(this.element.length>1)for(var t=0;t<this.element.length;t++)this.element[t].this.classList.toggle(e);else this.element.classList.toggle(e)}}let n;if(document.querySelectorAll(argument).length>1){n=[];for(var i=0;i<document.querySelectorAll(argument).length;i++)n.push(new obj(document.querySelectorAll(argument)[i]))}else n=document.querySelectorAll(argument)[0];try{return n.length,new obj(n)}catch(e){}}
function createMatriz(f,c,r=0) {let m=[f];for (var i = 0; i <f; i++) {m[i]=[];for (var e = 0; e < c; e++) {m[i][e]=r;}}return m;}
function Random(min, max) { return Math.floor(Math.random() * (max - min)) + min;}//no incluye al max
class Canvas{
	constructor(obj=($("canvas"))?$("canvas").this:undefined){
		this.this=obj;
		if(this.this)this.ctx=obj.getContext("2d");
		else console.error("NO se encuentra un elemnto canvas");
	}
	clear(){
		this.this.width=this.this.width;
	}
	getCanvas(){
		return $("canvas");
	}
}


