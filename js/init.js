$(document).ready(function() {
  urlRoot = "http://pizzariamanager-jdetecnologias632825.codeanyapp.com/";
  var formMeiaPizza = {
    esconderBotoes: function() {
      $("#botoesTamanhoMeiaPizza").hide();
    },
    mostrarBotoes: function() {
      $("#botoesTamanhoMeiaPizza").show();
      console.log("mostrarBotoes");
    },
    getQtd: function() {
      return parseInt($("#pedidoPizzaMeia").attr("qtd"));
    }
  }
  function verPedidos(){
    $.ajax({
      url:getUrl("verPedido/atualizarPagina"),
      type:"GET",
      success: function(r){
        $("#visualizarPedidos").parent().html(r);
      }
    }
    
    );
  }
    function definirIntervaloPedidosEmAberto(){
	var atualizarPagina = setInterval(function(){
			verPedidos();
			},10000);
			return atualizarPagina;
  }
  function getUrl(url) {
    return urlRoot + url;
  }
  verPedido = verPedidos();
  getURL = function getUr(url) {
    return urlRoot + url;
  }

  function apagarDadosDoFormulario(form) {
    var Elementos = ("input", "select");
    var y = 0;
    while (Elementos[y]) {
      var inputs = form.querySelectorAll(Elementos[y]);
      var x = 0;
      while (inputs[x]) {
        inputs[x].value = "";
        x++;
      }
      y++;
    }
  }

  function getPrecosPizzaDB(tamanho) {
    var valorDaPizza;
    $.ajax({
      url: getUrl("produto/getPrecosPizzaPorTamanho"),
      data: {
        tamanho: tamanho
      },
      type: 'post',
      success: function(r) {
        this.valorDaPizza = r;
        console.log(this.valorDaPizza);
      },
      error: function() {
        this.valorDaPizza = 30.0;
      }
    });
    // return preco;
  }
  var pr = getPrecosPizzaDB('M');
  console.log("Tamanho M preço R$: " + pr);

  function arredondarNumeros(numero, qtdCasasDecimais) {
    var multiplicador = Math.pow(10, qtdCasasDecimais);
    var resultado = numero * multiplicador;
    resultado = parseInt(resultado);
    return resultado / multiplicador;
  }
  (function(e) {
    "use strict";
	
			
    if(document.querySelector("#visualizarPedidos") == null){
  
      }
    else{	
			var at = definirIntervaloPedidosEmAberto();
			$(document).on("click","#aberto",function(){
				clearInterval(at);
				at = definirIntervaloPedidosEmAberto();
			});
			$(document).on("click",".limparIntervalo",function(){
				clearInterval(at);
			});
			
    }
    if (document.getElementById("categoria") != null) {
      function haCampoPreco() {
        if (document.getElementById("precoProduto") != null) {
          return document.getElementById("precoProduto");
        } else {
          return false;
        }
      }
      
      
      
      
      var categoria = document.getElementById("categoria");
      categoria.addEventListener("change", function() {
        var caracDosProdutos = document.getElementById("caracDosProdutos");
        if (categoria.value == 1 || haCampoPreco() !== false) {
          if (categoria.value == 1) {
            haCampoPreco().parentNode.removeChild(haCampoPreco());
          }
        } else {
          var fieldSet = criarEl("FIELDSET");
          var label = criarEl("LABEL", "Preço");
          var input = criarEl("INPUT");
          var div = criarEl("DIV");
          input.classList.add("form-control");
          div.classList.add("form-group");
          div.setAttribute("id", "precoProduto");
          input.setAttribute("type", "text");
          input.setAttribute("name", "preco");
          input.setAttribute("id", "preco");
          label.setAttribute("for", "preco");
          label.appendChild(input);
          fieldSet.appendChild(label);
          div.appendChild(fieldSet);
          caracDosProdutos.appendChild(div);
        }
      });
    }

    function getDadosCliente() {
      return document.getElementById("dados-do-cliente");
    }

    function criarEl(el = null, texto = null) {
      if (el == null) {
        return document.createTextNode(texto);
      } else {
        var ele = document.createElement(el);
        if (texto != null) {
          var txt = document.createTextNode(texto);
          ele.appendChild(txt);
        }
        return ele;
      }
    }

    function precosPizzas() {
      var tabela = {
        Media: 20,
        Grande: 30,
        Familia: 40,
        Especiais: 35
      }
      return tabela;
    }

    function limparInput(id) {
      var x = 0;
      while (arguments[x]) {
        document.getElementById("" + arguments[x] + "").value = "";
        x++;
      }
    }
    var valor_total = 0.0;
    var contador = 0;
    var maior = 0;
    var dadosDoPedido = [];

    function getValorTotal() {
      var x = 0;
      var t = 0.0;
      while (dadosDoPedido[x]) {
        var p = parseFloat(dadosDoPedido[x].preco);
        t += p;
        x++;
      }
      return t;
    }
    (function() {
      function novaPizzaMeia() {
        var obj = {
          valorTotal: 0,
          tabelaSelecao: function() {
            return document.querySelector("#pedidoPizzaMeia");
          },
          verificaCodigo: function(codigo) {
            var trs = this.tabelaSelecao().querySelectorAll("tr");
            if (trs.length === 0) {
              return true;
            } else {
              var x = 0;
              var qtd = 0;
              while (trs[x]) {
                var code = trs[x].getAttribute("codigo");
                if (code == codigo) {
                  qtd++;
                }
                x++;
              }
              if (qtd === 0) {
                return true;
              } else {
                return false;
              }
            }
          },
          getAnotherTable: function() {
            return document.querySelector("#valorTotalPizzaMeia");
          },
          getQtdSabores: function() {
            return this.tabelaSelecao().childNodes.length - 1;
          },
          addValor: function(valor) {
            this.valorTotal += valor;
          },
          setValorTotal: function(valor) {
            this.valorTotal = valor;
            document.getElementById("valorTotalPizzaMeia").textContent = valor.toFixed(2);
          },
          setDescricao: function() {
            document.getElementById("descricaoPizzaMeia").textContent = this.getDescricaoDasTr();
          },
          getValorTotal: function() {
            return this.valorTotal;
          },
          getDescricao: function() {
            return document.getElementById("descricaoPizzaMeia").textContent;
          },
          getDescricaoDasTr: function() {
            var trs = this.tabelaSelecao().querySelectorAll(".descricaoItem");
            var x = 0;
            var txt = "";
            while (trs[x]) {
              txt += trs[x].textContent + " ";
              x++;
            }
            return txt;
          },
          apagarDadosTabela: function() {
            var trs = this.tabelaSelecao().querySelectorAll("tr");
            var x = 0;
            while (trs[x]) {
              this.tabelaSelecao().removeChild(trs[x]);
              x++;
            }
            this.setDescricao("");
            this.getAnotherTable().textContent = "";
          }
        }
        return obj;
      }
      var meiaPizza = document.getElementsByClassName("meiaPizza");
      var fecharMeiaPizza = document.querySelectorAll(".fecharMeiaPizza");
      var tabelaSelecao = document.getElementById("pedidoPizzaMeia");
      var tabelaPizzaMeia = new novaPizzaMeia();
      $(".selecionarPreco").on("click", function() {
        var precos = precosPizzas();
        var pai = $(this).parent().attr("namespace");
        var tamanho = $(this).attr("tamanho");
        $("#" + pai).attr("tamanho", tamanho)
        $("#" + pai + " .preco").html(precos[tamanho]);
        $("#" + pai + " #preco").val(precos[tamanho]);
      });
      var qtdSaboresPermitidos = 2;
      (function() {
        function removePai(elemento) {
          elemento.addEventListener("click", function() {
            var qtd = parseInt($("#pedidoPizzaMeia").attr("qtd"));
            $("#pedidoPizzaMeia").attr("qtd", qtd - 1)
            if (parseInt($("#pedidoPizzaMeia").attr("qtd")) === 0) {
              $("#botoesTamanhoMeiaPizza").show();
            }
            var valorTotal = tabelaPizzaMeia.getValorTotal();
            var TRpai = elemento.parentNode.parentNode;
            var valorItem = TRpai.querySelector(".precoItem").textContent;
            valorItem = parseFloat(valorItem);
            var novoValor = valorTotal - valorItem;
            TRpai.parentNode.removeChild(TRpai);
            tabelaPizzaMeia.setValorTotal(novoValor);
            tabelaPizzaMeia.setDescricao();
          });
        }

        function adicionarItem() {
          var codigo = this.getAttribute("codigo");
          var preco = parseFloat(this.querySelector("input").value) / 2;
          var sabor = this.querySelector(".descricao").getAttribute("sabor");
          sabor = " meia " + sabor;
          if (tabelaPizzaMeia.verificaCodigo(codigo) == false) {
            alert("Produto já incluido!");
          } else {
            if (tabelaPizzaMeia.getQtdSabores() > 1) {
              alert("Somente são permitidos " + qtdSaboresPermitidos + " sabores de pizza!");
            } else {
              formMeiaPizza.esconderBotoes();
              var qtd = formMeiaPizza.getQtd();
              $("#pedidoPizzaMeia").attr("qtd", qtd + 1)
              var tr = criarEl("TR");
              tr.setAttribute("codigo", codigo);
              var td = criarEl("TD", sabor);
              td.classList.add("descricaoItem");
              tr.appendChild(td);
              td = criarEl("TD", preco.toFixed(2));
              td.classList.add("precoItem");
              tr.appendChild(td);
              var spanX = criarEl("SPAN");
              spanX.classList.add("btn");
              spanX.classList.add("fas");
              spanX.classList.add("fa-trash-alt");
              spanX.classList.add("text-danger");
              spanX.classList.add("btn-sm");
              spanX.classList.add("removerItem");
              td = criarEl("TD", null);
              td.appendChild(spanX);
              tr.appendChild(td);
              tabelaPizzaMeia.tabelaSelecao().appendChild(tr);
              removePai(spanX);
              var VT = arredondarNumeros(tabelaPizzaMeia.getValorTotal() + parseFloat(preco), 2);
              tabelaPizzaMeia.setDescricao();
              tabelaPizzaMeia.setValorTotal(VT);
            }
          }
        }
        for (var h = 0; h < meiaPizza.length; h++) {
          meiaPizza[h].addEventListener("click", function() {
            adicionarItem.apply(this);
          });
        }
      })();

      function fecharTela() {
        if (tabelaPizzaMeia.getQtdSabores() == 2) {
          dadosDoPedido.push({
            "codigo": 9999,
            "preco": arredondarNumeros(tabelaPizzaMeia.getValorTotal(), 2),
            "texto": tabelaPizzaMeia.getDescricao()
          });
          formMeiaPizza.mostrarBotoes();
          var cabecalho = getElContent("#corpo_pedido tr.cabecalho");
          listarItens(dadosDoPedido, "#corpo_pedido", cabecalho);
          tabelaPizzaMeia.apagarDadosTabela();
          tabelaPizzaMeia = new novaPizzaMeia();
        } else {
          alert("Favor selecionar dois sabores de pizza para completar o pedido da meia pizza!");
        }
      }
      for (var h = 0; h < fecharMeiaPizza.length; h++) {
        fecharMeiaPizza[h].addEventListener("click", function() {
          fecharTela();
        });
      }
    })();

    function listarLinha(x, arr, elemento) {
      var texto = '<tr indice="' + x + '">\n\
                    <td>' + arr[x].texto + '</td>\n\
                    <td>' + arr[x].preco + '</td>\n\
                    <td class="remover">\n\
                     <span class="btn btn-sm fas fa-trash-alt"></span></td></tr>';
      return texto;
    }

    function getElContent(el) {
      var elementos = document.querySelectorAll(el);
      var x = 0;
      var texto = "<tr class='cabecalho'>";
      while (elementos[x]) {
        texto += "<tr class='cabecalho'>" + elementos[x].innerHTML + "</tr>";
        x++;
      }
      texto += "</tr>";
      return texto;
    }

    function listarItens(arr, elemento, cabecalho) {
      var x = 0;
      var texto = cabecalho;
      $(elemento).html("");
      while (arr[x]) {
        texto += listarLinha(x, arr, elemento);
        x++;
      }
      $(elemento).append(texto);
      $("#valor_total").html("R$ " + getValorTotal().toFixed(2));
    }

    function removeItem(arr, inicio, qtd) {
      arr.splice(inicio, qtd);
    }
    document.addEventListener("click",function(e){
      if(e.target.classList.contains("btn-finalizar")){
        finalizarPreparo(e.target);
      }
       
	  
    function finalizarPreparo(el) {
      var btnFinalizar = document.querySelectorAll(".btn-finalizar");
      var x = 0;
      
        
          var numeroPedido = el.parentNode.parentNode.getAttribute("pedido");
           var resposta =confirm("Você deseja finalizar o preparo deste pedido? ");
          if(resposta){
          $.ajax({
            url: getUrl("FinalizarPreparo/finalizar"),
            type: "post",
            data: {
              "numeroPedido": numeroPedido
            },
            success: function(r) {
              r = parseInt(r);
              if (r == 1) {
                alert("O pedido foi finalizado");
                verPedidos();
              } else if (r === 0) {
                alert("Deu errado");
              }
            }
          });
          }
       
      
    }
    $('.produto').on('click', function() {
      var preco = $(this).children(".preco").text(); //acessar filho
      var codigo = $(this).attr('codigo'); //
      var x = dadosDoPedido.length;
      var texto = $(this).children(".descricao").text();
      valor_total += parseFloat(preco);
      dadosDoPedido.push({
        "codigo": codigo,
        "preco": preco,
        texto: texto
      });
      var cabecalho = getElContent("#corpo_pedido tr.cabecalho");
      listarItens(dadosDoPedido, "#corpo_pedido", cabecalho);
    });
    $("#salvarPedido").on("click", function(event) {
      event.preventDefault();
      var status = getDadosCliente().getAttribute("status");
      if (dadosDoPedido.length === 0) {
        alert("nulo");
      } else {
        var controle = 0;
        if (status === "1") {
          var id_cliente = document.querySelector("#id_cliente").value;
          var dados = {
            "id_cliente": id_cliente,
            "dadosDoPedido": dadosDoPedido
          };
          $.ajax({
            url: getUrl('anotarPedido/finalizar'),
            type: "post",
            data: dados,
            success: function(result) {
              if (result == "1") {
                alert("Pedido cadastrado com sucesso!");
                location.reload();
              }
            },
            error: function() {
              alert("Pedido não salvo!");
            }
          });
          controle = 1;
        } else {
          var campoNome = $("#nomeInput");
          var campoEnd = $("#endInput");
          var campoBairro = $("#bairroInput");
          var campoTel = $("telefonePedido");
          var cep = $("#cep");
          var cidade = $("#cidade");
          var uf = $("#uf");
          var data = {
            nome: campoNome,
            end: campoEnd,
            bairro: campoBairro,
            tel: campoTel,
            cidade: cidade,
            cep: cep,
            uf: uf
          }
          $.ajax({
            url: getUrl('cadastroCliente/cadastrar'),
            type: "post",
            data: data,
            success: function(result) {
              if (result != "9") {
                $("#id_cliente").val(result);
                alert("Cliente cadastrado com sucesso!");
                location.reload();
              } else if (result == "9") {
                alert("Favor preencher todos os campos obrigatórios");
              }
            },
            error: function() {
              alert("Cliente não salvo!");
            }
          });
          status = 1;
        }
      }
    });
    $(document).on('click', '.remover', function() {
      var indice = $(this).parent().attr("indice");
      indice = parseInt(indice);
      removeItem(dadosDoPedido, indice, 1);
      var cabecalho = getElContent("#corpo_pedido tr.cabecalho");
      listarItens(dadosDoPedido, "#corpo_pedido", cabecalho);
      contador--;
      $("#valor_total").html("R$ " + getValorTotal().toFixed(2));
    });
    $(".cep").on("blur", function() {
      var paiDeTodos = $(this).parent();
      var id = paiDeTodos.attr("id");
      $(".complemento").val("");
      $.ajax({
        url: "https://viacep.com.br/ws/" + $(this).val() + "/json/",
        dataType: "json",
        type: "get",
        success: function(end) {
          $("#" + id + " .end").val(end.logradouro);
          $("#" + id + " .bairro").val(end.bairro);
          $("#" + id + " .cidade").val(end.localidade);
          $("#" + id + " .uf").val(end.uf);
        },
        error: function() {
          alert("CEP não encontrado");
        }
      });
    });
    
    $("#telefonePedido").on('blur', function() {
      var este = $(this);
      var campoNome = $("#nomeInput");
      var campoEnd = $("#endInput");
      var campoBairro = $("#bairroInput");
      var nomeCliente = $("#nomeCliente");
      if (este.val() === "") {
        getDadosCliente().setAttribute("status", 0);
        limparInput("nomeInput", "endInput", "id_cliente", "bairroInput");
        campoNome.attr("readOnly", true);
        campoEnd.attr("readOnly", true);
        campoBairro.attr("readOnly", true);
        nomeCliente.html("");
      } else {
        var data = {
          telefone: $(this).val()
        };
        $.ajax({
          url: getUrl("exibir/getClienteByTel/"),
          data: data,
          type: 'post',
          success: function(r) {
            var campoDadosCliente = getDadosCliente();
            if (r.status == 0) {
              $("#dadosCliente").attr("cadastrarCliente", "true");
              campoNome.val("");
              campoEnd.val("");
              campoNome.attr("readonly", false);
              campoEnd.attr("readonly", false);
              $("#id_cliente").val("");
            } else if (r.status == 1) {
              console.log(r);
              $("#nomeCliente").html(r.nome);
              $("#nomeInput").val(r.nome);
              $("#endInput").val(r.end);
              $("#bairroInput").val(r.bairro);
              $("#id_cliente").val(r.id_cliente);
              campoNome.attr("readonly", true);
              campoEnd.attr("readonly", true);
            }
            getDadosCliente().setAttribute("status", r.status);
          },
          error: function() {
            alert("Erro em recuperar cliente");
          },
          dataType: 'json'
        });
      }
    });
  })();
});
