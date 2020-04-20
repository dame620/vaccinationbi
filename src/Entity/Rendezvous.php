<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Controller\RendezvousController;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *
 * normalizationContext={"groups"={"readertrans"}},
 * denormalizationContext={"groups"={"writertrans"}},
 *
 * collectionOperations={
 * 
 * 
 * "POST"={
 *     "controller"=RendezvousController::class,
 * 
 *      },
 * 
 * "GETALLUSER"={
 * "method"="GET",
 *
 *   }
 * },
 * 
 * itemOperations={
 *    
 * "recuperationadmin"={
 *      "method"="GET",
 *      
 * },
 
 * "PUT"={
 
 * },
 * } 
 * )
 * @ORM\Entity(repositoryClass="App\Repository\RendezvousRepository")
 */
class Rendezvous
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Enfant", inversedBy="rendezvouses")
     */
    private $enfant;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Action", inversedBy="rendezvouses",cascade={"persist"})
     */
    private $action;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="rendezvouses")
     */
    private $user;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $daterv;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $etatrv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnfant(): ?Enfant
    {
        return $this->enfant;
    }

    public function setEnfant(?Enfant $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }

    public function getAction(): ?Action
    {
        return $this->action;
    }

    public function setAction(?Action $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDaterv(): ?\DateTimeInterface
    {
        return $this->daterv;
    }

    public function setDaterv(?\DateTimeInterface $daterv): self
    {
        $this->daterv = $daterv;

        return $this;
    }

    public function getEtatrv(): ?bool
    {
        return $this->etatrv;
    }

    public function setEtatrv(?bool $etatrv): self
    {
        $this->etatrv = $etatrv;

        return $this;
    }
}
