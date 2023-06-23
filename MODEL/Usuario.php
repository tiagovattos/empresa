<?php
namespace MODEL;

class Usuario {
    private ?int $id;
    private ?string $usuario;
    private ?string $senha;

    public function __construct(?int $id = null, ?string $usuario = null, ?string $senha = null) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getUsuario(): ?string {
        return $this->usuario;
    }

    public function setUsuario(?string $usuario): void {
        $this->usuario = $usuario;
    }

    public function getSenha(): ?string {
        return $this->senha;
    }

    public function setSenha(?string $senha): void {
        $this->senha = $senha;
    }
}
?>