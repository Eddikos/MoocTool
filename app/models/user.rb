class User < ActiveRecord::Base
  # Include default devise modules. Others available are:
  # :confirmable, :lockable, :timeoutable and :omniauthable
  devise :database_authenticatable, :registerable,
         :recoverable, :rememberable, :trackable, :validatable

  validates :full_name, presence: true

  has_many :authentications

  has_many :friendships
  has_many :friends, through: :friendships, class_name: "User"

  has_many :friend_requests, foreign_key: "to_id"

  def to_s
    full_name
  end
end
