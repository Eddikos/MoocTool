class FriendRequestsController < ApplicationController
  before_filter :authenticate_user!

  def index
    @friend_requests = current_user.friend_requests.order(created_at: :desc)

    if request.xhr?
      @friend_requests = @friend_requests.limit(8)
    end

    render :layout => !request.xhr?

    @friend_requests.update_all(viewed: true)
  end

  def create
    @user = User.find(params[:id].sub(/\D+/, ''))

    # 404 if already friends or current user has already sent a request
    raise ActiveRecord::RecordNotFound if @user.friends.find_by(id: current_user) or @user.friend_requests.find_by(from: current_user)

    if request = current_user.friend_requests.find_by(from: @user)
      # If there is already an opposite request, just accept it rather than send another.
      request.accept
    else
      @user.friend_requests.create(from: current_user)
    end
  end

  def destroy
    @request = FriendRequest.find_by!("(to_id = ? or from_id = ?) and id = ?", current_user.id, current_user.id, params[:id])
    @request.destroy
  end

  def accept
    @request = FriendRequest.find_by!(to: current_user, id: params[:id])
    @request.accept
  end
end
