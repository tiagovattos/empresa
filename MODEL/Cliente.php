<?php
namespace MODEL;

class Cliente {
    private ?int $id;
    private ?string $nome;
    private ?string $cpf;
    private ?string $data_nascimento;
    private ?string $email;

    public function __construct(?int $id=null, ?string $nome=null, ?string $cpf=null, ?string $data_nascimento=null, ?string $email=null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->data_nascimento = $data_nascimento;
        $this->email = $email;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(?string $nome): void {
        $this->nome = $nome;
    }

    public function getCpf(): ?string {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): void {
        $this->cpf = $cpf;
    }

    public function getDataNascimento(): ?string {
        return $this->data_nascimento;
    }

    public function setDataNascimento(?string $data_nascimento): void {
        $this->data_nascimento = $data_nascimento;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(?string $email): void {
        $this->email = $email;
    }
}
?>