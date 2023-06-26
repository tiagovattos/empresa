<?php
namespace MODEL;

class Encomenda {
    private ?int $id;
    private ?string $fornecedor;
    private ?string $data_pedido;
    private ?int $id_produto;
    private ?int $quantidade;

    public function __construct(?int $id = null, ?string $fornecedor = null, ?int $id_produto = null, ?int $quantidade = null) {
        $this->id = $id;
        $this->fornecedor = $fornecedor;
        $this->data_pedido = date('Y-m-d');
        $this->id_produto = $id_produto;
        $this->quantidade = $quantidade;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getFornecedor(): ?string {
        return $this->fornecedor;
    }

    public function setFornecedor(?string $fornecedor): void {
        $this->fornecedor = $fornecedor;
    }

    public function getDataPedido(): ?string {
        return $this->data_pedido;
    }

    public function setDataPedido(?string $data_pedido): void {
        $this->data_pedido = $data_pedido;
    }

    public function getIdProduto(): ?int {
        return $this->id_produto;
    }

    public function setIdProduto(?int $id_produto): void {
        $this->id_produto = $id_produto;
    }

    public function getQuantidade(): ?int {
        return $this->quantidade;
    }

    public function setQuantidade(?int $quantidade): void {
        $this->quantidade = $quantidade;
    }
}
?>
